<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Admin;
use Mail;
class AdminController extends Controller
{
    //

public function login(){
   if(session('admin_id') == ""){

       return view('admin/login',['url'=>'Login Page','forgotpassword'=>'/admin/forgotpassword']);
   }
   else{
       return redirect('admin/dashboard');
   }

}

public function adminlogin(Request $request){

    $request->validate([
    'email'=>'required | email',
    'password'=>'required'
    ]);

    $admin = Admin::where(['email'=>$request['email'],'password'=>$request['password']])->first();

    if(!empty($admin)){

        session(['admin_id' => $admin->id , 'admin_name' => $admin->name]);
        
        return redirect('admin/dashboard')->with(['success'=>'Welcome to HR_Panel']);
    }
    else{
        return redirect()->back()->with(['success'=>'User not found']);
     }


}


public function forgotpassword(Request $request){
    $request->validate([
        'email'=>'required | email'
    ]);
    $email = $request['email'];
    
    $user = Admin::where(['email' => $email])->first();
    $id = $user['id'];

    if($user){
        $data = array('name'=>$user['name'],'email'=>$user['email'], 'id' => $id );   
        Mail::send('mailToAdmin', $data, function($message) use ($data){
        $message->to($data['email'], $data['name']);
        $message->subject('reset password');
        $message->from('stellawilliams934@gmail.com','Stella Williams');


    });
    return redirect()->back()->with(['success'=>'Please check your email for password reset link..']);
}
else{
        return redirect('admin/forgotpassword')->with(['success'=>'Email not found']);
        echo "no user found";
    }

}


public function resetpassword(Request $request, $id){


    
    $admin =  Admin::find($id);

    if($admin){

        $request->validate([
    'password'=>'required',
    'confirm_password'=>'required | same:password'
        ]);

        $admin->password = $request['password'];
        $admin->update();
        return redirect('admin/login')->with(['success'=>'Password reset successfully!! Please login here..']);


      }else{
          return redirect()->back()-with(['success'=>'This link has expired']);
      }


    return redirect('admin/login');
}
public function showDashboard(){
    
        return view('admin/dashboard',['url'=>'ADMIN DASHBOARD']);
    
}

public function editProfile(){

    $id = session()->get('admin_id');
    $admin = Admin::find($id);
    return view('admin/editprofile',['url'=>'Edit Profile','admin'=>$admin]);
}

public function updateProfile(Request $request){
    
    $id = session()->get('admin_id');
    $admin = Admin::find($id);

    if($admin){
        $request->validate([
'name'=>'required',
'email'=>'required',
'password'=>'required'
        ]);

        $admin->name = $request['name'];
        $admin->email = $request['email'];
        $admin->password = $request['password'];

        $admin->save();

        session()->forget(['admin_id', 'admin_name']);
        return redirect('admin/login')->with(['success'=>'Updated Successfully..Please login with new details.. ']);

        // return redirect()->back()->with(['success'=>'Updated Successfully....Please Login With New Details']);
    }

    return view('admin/editprofile',['url'=>'Edit Profile','admin'=>$admin]);
}



public function showChangePassword(){
        
    return view('admin/changepassword',['url'=>'Change Password']);
}

public function changePassword(Request $request){

$adminid = session('admin_id');

$request->validate([
'oldpassword'=>'Required',
'password'=>'Required',
'confirm_password'=>'Required | same:password'
]);

$admin = Admin::find($adminid);
if($admin['password']!== $request['oldpassword']){
    return redirect()->back()->with(['success'=>'Your password is incorrect']);
}else{
    $admin->password = $request['password'];
    $admin->update();
    return redirect()->back()->with(['success'=>'Password changed successfully']);
}



}



}
