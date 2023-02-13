<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

// session_start();

class UserController extends Controller
{
    public function index(){

    }

    public function login(Request $request){
        $user_mail=$request->user_mail;
        $password=$request->user_pass;
        $result=User::where('email',$user_mail)->where('password',$password)->first();
        if($result){
            Session::put('user_id',$result->id);
            Session::put('user_name',$result->name);
            Session::put('user_mail',$result->email);
            return Redirect::to('/task');
        }else{
            Session::put('message','User Not Found');
            return Redirect::to('/');
        } 
    }

    public function logout(){
        Session::flush();
        return Redirect::to('/');
    }

    public function register(Request $request){
        $user=new User;
        $user->name=$request->user_name;
        $user->email=$request->user_mail;
        $user->password=$request->user_pass;
        $user->save();
        Session::put('message','User Successfully Registered');
        return Redirect::to('/');
    }
    
    public function user_auth(){
        if(isset($_SESSION['user_id'])){
            return;
        }else{
            return Redirect::to('/');
        }
    }
}
