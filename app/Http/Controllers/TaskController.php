<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //

    public function tasks(Request $request){
        
        if(session()->has('user_id')){
            
            $id = session()->get('user_id');
            $tasks = Task::where(['user_id'=>$id])->get();
            return view('tasks',['tasks'=>$tasks,'url'=>'Task List']);
        }


        return view('tasks',['tasks'=>$tasks,'url'=>'Task List']);
    }

    public function updateTaskStatus($id){

        $task = Task::find($id);
        if($task->status_by_user === 0){

            $task->status_by_user = 1;
            $task->update();
        }
        else{
            $task->status_by_user = 0;
            $task->update();

        }
        return redirect()->back()->with(['success'=>'Task mark as complete']);
        die();

    }

    public function showTaskCompleted(){
        
    }

    public function taskCompleted(Request $request, $id){
        

        
        die($id);
    
    }

}
