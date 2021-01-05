<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::post('/login', 'UserController@userlogin');
/* 
Route::post('/', 'UserController@userlogin');

Route::get('/', function () {
    return view('login',['url'=>'Login Page','forgotpassword'=>'/forgotpassword']);
}); */

Route::get('/login', 'UserController@login');

/* Route::get('/forgotpassword', function () {
    return view('forgotpassword',['url'=>'Forgot Password']);
}); */

Route::get('/admin/login', 'admin\AdminController@login');
Route::get('/admin/logout', function () {
    session()->forget(['admin_id', 'admin_name']);
    return redirect('admin/login');
});
Route::post('/admin/login', 'admin\AdminController@adminlogin');

Route::get('admin/task/add/{id}', function(){
    return view('admin/assigntask',['url'=>'assigntask']);
});
Route::post('admin/task/add/{id}', 'admin\TaskController@assigntask')->middleware('adminauth');

Route::get('/admin/changepassword', 'admin\AdminController@showChangePassword');
Route::post('/admin/changepassword', 'admin\AdminController@changePassword');

Route::get('/user/changepassword','UserController@showChangePassword')->middleware('userauth');
Route::post('/user/changepassword','UserController@changePassword')->middleware('userauth');

Route::get('/admin/user/add','admin\UserController@showadduser')->middleware('adminauth');
Route::post('/admin/user/add', 'admin\UserController@adduser')->middleware('adminauth');
Route::get('/admin/users', 'admin\UserController@userlist')->middleware('adminauth');
Route::get('/admin/tasks', 'admin\TaskController@tasks')->middleware('adminauth');
Route::get('/admin/task/delete/{id}', 'admin\TaskController@delete')->middleware('adminauth');
Route::get('/admin/forgotpassword', function () {
    return view('admin/forgotpassword',['url'=>'Forgot Password']);
});

Route::get('/admin/editprofile', 'admin\AdminController@editProfile')->middleware('adminauth');
Route::post('/admin/editprofile', 'admin\AdminController@updateProfile')->middleware('adminauth');

Route::get('/admin/edituser/{id}', 'admin\UserController@edituser')->middleware('adminauth');
Route::get('/admin/updatestatus/{id}', 'admin\UserController@updatestatus')->middleware('adminauth');
Route::post('/admin/edituser/{id}', 'admin\UserController@updateuser')->middleware('adminauth');
Route::post('/admin/forgotpassword', 'admin\AdminController@forgotpassword');
Route::get('/user/forgotpassword', function () {
    return view('forgotpassword',['url'=>'Forgot Password']);
});
Route::post('/user/forgotpassword', 'UserController@forgotpassword');
Route::get('/admin/resetpassword/{id}', function () {
    return view('admin/resetpassword',['url'=>'Forgot Password']);
});
Route::get('/user/resetpassword/{id}', function () {
    return view('resetpassword',['url'=>'Forgot Password']);
});
Route::post('/user/resetpassword/{id}','UserController@resetpassword');
Route::post('/admin/resetpassword/{id}','admin\AdminController@resetpassword');
Route::get('/admin/dashboard', 'admin\AdminController@showDashboard')->middleware('adminauth');
Route::get('/user/dashboard', function () {
    return view('dashboard',['url'=>'USER DASHBOARD']);
});
Route::get('/user/editprofile', 'UserController@showEditProfile')->middleware('userauth');
Route::post('/user/editprofile', 'UserController@updateProfile')->middleware('userauth');
Route::get('/user/tasks','TaskController@tasks')->middleware('userauth');
Route::get('/sendbasicemail','MailController@basic_email');

Route::get('/user/logout', function () {
    session()->forget(['user_id', 'user_name']);
    return redirect('login');
});


Route::get('user/task/updateTaskStatus/{id}','TaskController@updateTaskStatus');

Route::get('user/task/completed/{id}','TaskController@showTaskCompleted');
Route::post('user/task/completed/{id}','TaskController@taskCompleted');

