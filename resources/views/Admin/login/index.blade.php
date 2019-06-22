@extends('layouts.admin')

@section('title','登录')

<link rel="stylesheet" href="/css/body.css">
<link rel="stylesheet" href="/css/chushi.css">
@section('cnt')
    <div class="w bx">
        <div class="header clearfix">
            <p id="p2" class="fr p2">登录</p>
        </div>
        <form class="form">
            @csrf
            <div class="login">
                <div>
                    <span class="log_name">用户名:</span>
                    <input type="text" name="username" id="username" value="{{old('username')}}" class="ipt" placeholder="大写字母开头共六位…">
                    <span class="log_error"></span>
                </div>
                <div>
                    <span class="log_name">密码:</span>
                    <input type="password" name="password" id="pwd" class="ipt" placeholder="大写字母开头共六位…">
                    <span class="log_error"></span>
                </div>
                <div>
                    <a href="{{route('Admin.Login.index')}}"  class="log" id="log">
                        登录
                    </a>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        $('#log').click(function(evt) {
            evt.preventDefault();
            var flag = true;
            var username = $('#username').val();
            var pat_name = /^[A-Z]{1}\w{5}$/;
            if (username == '') {
                flag = false;
                $('#username').next().html('用户名不能为空');
            } else if (!pat_name.test(username)) {
                flag = false;
                $('#username').next().html('用户名格式不对');
            } else {
                $('#username').next().html('');
            }

            var pwd = $('#pwd').val();
            var pat_pwd = /^[A-Z]{1}\w{5}/;
            if (pwd == '') {
                flag = false;
                $('#pwd').next().html('密码不能为空');
            } else if (!pat_pwd.test(pwd)) {
                flag = false;
                $('#pwd').next().html('密码格式不对');
            } else {
                $('#pwd').next().html('');
            }
            let url = $(this).attr('href');

            if(flag){

                var login = $('.form').serializeArray();
                // console.log(data)
                $.ajax({
                    url,
                    dataType: 'json',
                    type: 'POST',
                    data: login
                }).then(back=>{
                    // console.log(back)
                    if(back.status == 200){
                        location.href= 'user';
                    }else {

                    }
                })

            }
        })
        $('#p2').click(function(){
            $('.login').fadeToggle(2000);
        })
    </script>
@endsection
