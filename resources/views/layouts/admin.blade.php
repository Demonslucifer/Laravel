<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        /*h1{*/
            /*text-align: center;*/
            /*color: #fff;*/
        /*}*/
        body{
            background: url("/img/aa.jpeg");
            background-size: 1600px 900px;
            color: #fff;
        }
    </style>
    @yield('css')
</head>
<body>
{{--<h1>用户列表</h1>--}}
<div class="container">
    @include('layouts.msg')
    @yield('cnt')
</div>
</body>
<script src="/js/app.js"></script>
<script>
    setTimeout(()=>{
        $('.alert').fadeOut('slow');
    },1500);
</script>
@yield('js')
</html>