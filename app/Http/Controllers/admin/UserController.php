<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;
class UserController extends Controller
{
    //

    public function userlist(){
        $userlist = User::get();

            return view('admin/userlist',['url'=>'User List','users'=>$userlist]);
    }

    
    
    
    public function adduser(Request $request){
        
        
        
        
        $request->validate([
            'name' => 'Required | max:10',
            'email' => 'Required | email',
            'phone' => 'Required | numeric'
            ]);
            
            $tempmail = User::where(['email'=>$request['email']])->first();
            if($tempmail){
                return redirect()->back()->with(['success'=>'User with this Email is already registered. Please try adding user with different mail ID.']);
            }
        print_r($request->all());
     
        $bytes = openssl_random_pseudo_bytes(2);
        $pwd = bin2hex($bytes);

      
        $name = $request['name'];
        $email = $request['email'];
        $password = $pwd;
        $phone = $request['phone'];
        if($request['profile_picture']){

            $imageName = time().'.'.$request->profile_picture->extension();  
              $request->profile_picture->move(public_path('profileimages'), $imageName);    
        }

        
        $user = new User;
        
        $user->name = $name ;
        $user->email =$email ;
        $user->password=$password ;
        $user->phone= $phone;
        if($request['profile_picture']){

            $user->profile_picture = $imageName;
        }
        else{
            $user->profile_picture = "";

        }
        $user->save();

        //sending password to user on his mail
        if($user){
            $data = array('name'=>$user['name'],'email'=>$user['email'],'password'=>$user['password'] );   
            Mail::send('userRegistrationMail', $data, function($message) use ($data){
            $message->to($data['email'], $data['name']);
            $message->subject('You are registered  successfully..');
            $message->from('bhupen1005@gmail.com','Stella Williams');
    
    
        });
    }
                return redirect('admin/user/add')->with(['success'=>'Successfully Registered']);

    
    }

    public function showadduser(){
        
            return view('admin/adduser',['url'=>'Add new user']);
            
        }
        
        public function edituser($id){
            
            $user = User::find($id);
            if($user){
        return view('admin/edituser',['url'=>'Edit User','user'=>$user]);

    }else{

        echo 'user not found';
    }       

    }


    public function updateuser(Request $request, $id){
        
        $user = User::find($id);


        if($request['profile_picture'] != "")
    {
       
            $request->validate([
                'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

           
            $oldimage = $user['profile_picture'];
            if($oldimage != ""){

                $file_path = public_path('profileimages/').$oldimage;
                unlink($file_path);
            }
            $imageName = time().'.'.$request->profile_picture->extension();  
            $request->profile_picture->move(public_path('profileimages'), $imageName);    

                        $user->profile_picture = $imageName;
    }

    


        
        $request->validate([
            'name' => 'Required',
            'email' => 'Required',
            'password' => 'Required',
            'phone' => 'Required',
        ]);
        $name = $request['name'];
        $email = $request['email'];
        $password = $request['password'];
        $phone = $request['phone'];

        $user->name = $name ;
        $user->email =$email ;
        $user->password=$password ;
        $user->phone= $phone;
        $user->update();

        return redirect()->back()->with(['user'=>$user,'success'=>'Profile Updated..','admin_image'=>$user['image']]);

        }

        public function updateStatus($id){

            $user = User::find($id);

            if($user){
                if($user->status === 0){

                    $user->status = 1;
                    $user->update();
                    return redirect()->back()->with(['success'=>'Activated Successfully']);
                }
                else{
                    $user->status = 0;

                    $user->update();
                    return redirect()->back()->with(['success'=>'Deactivated Successfully']);
                }
            }
            else{

                echo ('Bad Request...');
            }

        }



}
