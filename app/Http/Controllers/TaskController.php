<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function index(){
        $this->user_auth();
        $user_id=Session::get('user_id') ? Session::get('user_id') : 0;
        $tasks=Task::where('u_id',$user_id)->get();
        return view('tasklist',compact('tasks'));
    }

    public function add_task(Request $request){
        $this->user_auth();
        $task = new Task;
        $task->task_des = $request->task_detail;
        $task->u_id = $request->user_id;
        $task->save();
        Session::put('message','Task Successfully Added');
        return Redirect::to('/task');
    }

    public function update_task(){
        
    }

    public function delete_task(Task $task){
        $this->user_auth();
        $delete=$task->delete();
        if($delete){
            Session::put('message','Task is deleted');
        }else{
            Session::put('message','Task is not deleted');
        }
        return Redirect::to('/task');
    }

    public function task_status_change(Task $task){
        $this->user_auth();
        if($task->status==1){
            $task->update(['status'=>2]);
        }else{
            $task->update(['status'=>1]);
        }
        Session::put('message','Task Status Updated Successfully');
        return Redirect::to('/task');
    }

    public function user_auth(){
        if(Session::get('user_id') && Session::get('user_mail')){
            return;
        }else{
            return Redirect::to('/');
        }
    }
}
