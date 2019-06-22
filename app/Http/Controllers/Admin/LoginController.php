<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function login(Request $request)
    {
       $post = $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
//       dump($post);
        $res = User::where('username',$post['username'])->first();
        if(!$res){
            session()->flash('error','用户名或密码错误');
            $info = ['msg'=>'用户名或密码错误','status'=>'400'];
            return $info;
        }
        if($res->password != $post['password']){
            session()->flash('error','用户名或密码错误');
            $info = ['msg'=>'用户名或密码错误','status'=>'400'];
            return $info;
        }else{
            session(['admin.user' => $res]);
            return ['msg'=>'登录成功','status'=>'200'];
        }


    }
}
