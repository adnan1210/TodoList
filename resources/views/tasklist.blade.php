<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>To-Do List Web</title>
        
        <!-- style -->
        <link id="bootstrap-style" href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <style>
            #add_task
            {

            }
        </style>
        <!-- style -->
    </head>
    <body>
        <div class="container-fluid mt-3 text-center">
            <div class="row">
                <!-- Logo Image -->
                <div id="logo" class="col-sm-4">
                    <img src="images/logo2.jpg" class="rounded" alt="H&H TECH logo" height="50">
                </div>
                <!-- Logo Image -->
                <div class="col-sm-4">
                    <h2 class="text-success">Welcome <?php echo Session::get('user_name'); ?></h2>
                </div>
                <div class="col-sm-4">
                    <a href="/logout"><button class="btn btn-danger">Logout</button></a>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <h5 class="text-warning">
                <?php 
                    echo Session::get('message');
                    Session::forget('message');
                ?>
            </h5>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="mt-4 mx-auto text-center">
                        <h3 style="color:blue">Add Task</h3>
                        <form id="add_task" class="form mt-5 mb-5" action="/addtask" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="task_detail" name="task_detail"></textarea>
                                <label for="task_detail">Description</label>
                            </div>
                            <input type="hidden" name="user_id" id="user_id" value=<?php  echo Session::get('user_id'); ?>>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-8 mt-4 text-center">
                    <h3 style="color:blue">Task List</h3>
                    <table class="table mt-3">
                        <thead>
                            <th>Task No.</th>
                            <th>Task</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->task_des}}</td>
                                <td>                                    
                                    @if($task->status==1)
                                        <b style="color:red">Pending</b>
                                    @else
                                        <b style="color:green">Complete</b>
                                    @endif
                                </td>
                                <td>
                                    @if($task->status==1)
                                    <a href="/task_status{{$task->id}}"> 
                                        <button class="btn btn-success">Complete</button>
                                    </a>
                                    @else
                                    <a href="/task/{{$task->id}}/delete">
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                    @endif                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>