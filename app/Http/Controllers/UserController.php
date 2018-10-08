<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function getRegisterAdmin(){
        return view('admin/register');
    }

    public function  postRegisterAdmin(Request $request){
        $this->validate($request,[
           'username'=>'required|min:3',
           'email'=>'required|email|unique:users,email',
           'password1'=>'required|min:3|max:32',
           'password2'=>'required|same:password1',
            ],[
                'username.required'=>'You not type username',
                'username.min'=>'Username not min 3 char',
                'email.required'=>'You not type email',
                'email.unique'=>'Email is real exist',
                'password1.required'=>'You not type password',
                'password1.min'=>'Password not min 3 char',
                'password1.max'=>'Password not max 32 char',
                'password2.required'=>'You not re-enter password',
                'password2.same'=>'Password not match',
        ]);
        $user=new User();
        $user->name=$request->username;
        $user->email=$request->email;
        $user->password=bcrypt($request->password1);
        $user->save();

        return redirect('admin/register')->with('notification','Register Successful');
    }


    //
    public function getLoginAdmin(){
        return view('admin/login');
    }
    public function postLoginAdmin(Request $request){
        $this->validate($request,[
            'log_email'=>'required',
            'log_pass'=>'required|min:3|max:32',
            ],[
                'log_email.required'=>'You not type email',
                'log_pass.required'=>'You not type password',
                'log_pass.min'=>'Password not min 3 char',
                'log_pass.max'=>'Password not max 32 char',
        ]);
        if (Auth::attempt(['email'=>$request->log_email,'password'=>$request->log_pass])) {
            return redirect('admin/index')->with('notification','Login Successful');
        }else{
            return redirect('admin/login')->with('notification','Login Not Success');
        }
    }

    //
    public function getLogoutAdmin(){
        Auth::logout();
        return redirect('admin/login');
    }
}
