@extends('layouts.admin')

@section('title','添加')

@section('cnt')
    <form method="post" action="{{route('Admin.index.create')}}">
        @csrf
        <div class="form-group">
            <label >用户名 :</label>
            <input type="text" class="form-control" name="username" value="{{old('username')}}">
        </div>
        <div class="form-group">
            <label >真实姓名 :</label>
            <input type="text" class="form-control" name="truename" value="{{old('truename')}}">
        </div>
        <div class="form-group">
            <label >密码 :</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label >邮箱 :</label>
            <input type="text" class="form-control" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label >QQ :</label>
            <input type="text" class="form-control" name="qq" value="{{old('qq')}}">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="添加用户">
        </div>

    </form>





@endsection