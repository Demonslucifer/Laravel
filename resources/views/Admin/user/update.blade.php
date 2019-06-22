@extends('layouts.admin')

@section('title','修改')

@section('cnt')
    <form method="post" action="{{route('Admin.index.update',['id'=>$info->id])}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label >用户名 :</label>
            <input type="text" class="form-control" name="username" value="{{$info->username}}">
        </div>
        <div class="form-group">
            <label >真实姓名 :</label>
            <input type="text" class="form-control" name="truename" value="{{$info->truename}}">
        </div>
        <div class="form-group">
            <label >邮箱 :</label>
            <input type="text" class="form-control" name="email" value="{{$info->email}}">
        </div>
        <div class="form-group">
            <label >QQ :</label>
            <input type="text" class="form-control" name="qq" value="{{$info->qq}}">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="修改用户">
        </div>

    </form>





@endsection
