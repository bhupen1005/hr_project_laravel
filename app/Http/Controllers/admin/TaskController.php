<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class TaskController extends Controller
{
    //


    public function assigntask(Request $request,$id){

         $id;

         $user = User::where(['id'=>$id])->first();
         
         if($user){
             
             $request->validate([
                 'task' => 'required',
                 'description' => 'required',
                 'date'=>'required | date'
             ]);

             $task = new Task;
            
             $task->user_id = $id;
             $task->title = $request['task'];
             $task->description = $request['description'];
             $task->date = $request['date'];

             $task->save();

             return redirect('admin/users')->with(['success'=>"Task is assigned successfully to {$user['name']}"]);
            }
            else{
            return redirect('users')->with(['success'=>"User not found"]);

        }





    }

    public function tasks(){
        $tasks = Task::get();
        $users = User::get();

        return view('admin/tasks',['tasks'=>$tasks, 'users'=>$users,'url'=>'Task List']);
    }
    
    public function delete($id){
        
        $task = Task::find($id);
        
        if($task){

            $task->delete();

            return redirect('admin/tasks')->with(['success'=>'Deleted Record Successfully ']);
        }else{

            return redirect('admin/tasks')->with(['success'=>' Record Not Found ']);
        }



    }


}
