<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;

class UserController extends Controller
{
    //

/*     public function userlist(){
        $userlist = User::get();

            return view('admin/userlist',['url'=>'User List','users'=>$userlist]);
    } */

public function login(){

    
        if(session('user_id') == ""){
            return view('login',['url'=>'Login Page','forgotpassword'=>'/forgotpassword']);
        }
        else{
            return redirect('user/tasks');
        }
}






    public function userlogin(Request $request){

        $request->validate([
        'email'=>'required | email',
        'password'=>'required'
        ]);
    
        $user = User::where(['email'=>$request['email'],'password'=>$request['password']])->first();
    
            if($user['status'] !== 0){

                session(['user_id' => $user['id'] ,'status'=>$user['status'], 'user_name' => $user['name']]);


                return redirect('user/tasks')->with(['success'=>'Welcome to User Dashboard']);
            }
            else{
                return redirect()->back()->with(['success'=>'You are currently deactivated or not registered with us.']);
            }
    
            
            
        }

        public function showEditProfile(){
         
            
            if(session()->has('user_id')){
            
                $id = session()->get('user_id');
                $user = User::find($id);
                if($user){
                    return view('editprofile',['url'=>'Edit Profile','user'=>$user]);
                    
                }else{
                    
                    echo 'user not found';
                }       
            }
            
            
            $user = User::find($id);
            
            
            
        }
        
        
        
        public function updateProfile(Request $request){
            
            
            if(session()->has('user_id')){
                
                $id = session()->get('user_id');
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


            session(['user_name' => $user->name]);

            return redirect()->back()->with(['user'=>$user,'success'=>'Profile Updated..','admin_image'=>$user['image']]);
    
            
            }else{
                echo "You can't do that without logging in.";
            }
        
            }


            public function forgotpassword(Request $request){

                $request->validate([
                    'email'=>'required | email'
                ]);
                $email = $request['email'];
                
                $user = User::where(['email' => $email])->first();
                $id = $user['id'];
            
                if($user){
                    $data = array('name'=>$user['name'],'email'=>$user['email'], 'id' => $id );   
                    Mail::send('mailToUser', $data, function($message) use ($data){
                    $message->to($data['email'], $data['name']);
                    $message->subject('reset password');
                    $message->from('bhupen1005@gmail.com','Stella Williams');
            
            
                });
                return redirect()->back()->with(['success'=>'Please check your email for password reset link..']);
            }
            else{
                    return redirect('admin/forgotpassword')->with(['success'=>'Email not found']);
                    echo "no user found";
                }
            
            }
            


            
public function resetpassword(Request $request, $id){


    
    $user =  User::find($id);

    if($user){

        $request->validate([
    'password'=>'required',
    'confirm_password'=>'required | same:password'
        ]);

        $user->password = $request['password'];
        $user->update();
        return redirect('login')->with(['success'=>'Password reset successfully!! Please login here..']);


      }else{
          return redirect()->back()-with(['success'=>'This link has expired']);
      }


    return redirect('login');
}



public function showChangePassword(){
        
    return view('changepassword',['url'=>'Change Password']);
}

public function changePassword(Request $request){

$userid = session('user_id');

$request->validate([
'oldpassword'=>'Required',
'password'=>'Required',
'confirm_password'=>'Required | same:password'
]);

$user = User::find($userid);
if($user['password']!== $request['oldpassword']){
    return redirect()->back()->with(['success'=>'Your password is incorrect']);
}else{
    $user->password = $request['password'];
    $user->update();
    return redirect()->back()->with(['success'=>'Password changed successfully']);
}



}



    
}
