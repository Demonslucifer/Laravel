@extends('layouts.admin')

@section('title','添加')

@section('cnt')
    {{--<form method="post" action="{{route('Admin.index.create')}}" enctype="multipart/form-data">--}}
    <form method="post" action="{{route('Admin.index.create')}}">
        @csrf
        <div class="form-group">
            <label>用户名 :</label>
            <input type="text" class="form-control" name="username" value="{{old('username')}}">
        </div>
        <div class="form-group">
            <label>真实姓名 :</label>
            <input type="text" class="form-control" name="truename" value="{{old('truename')}}">
        </div>
        <div class="form-group">
            <label>密码 :</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label>邮箱 :</label>
            <input type="text" class="form-control" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label>QQ :</label>
            <input type="text" class="form-control" name="qq" value="{{old('qq')}}">
        </div>
        <br>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="pic">
                <label class="custom-file-label" for="inputGroupFile04">选择头像</label>
            </div>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="upFile()">上传头像</button>
            </div>
        </div>
        <img src="" width="100px" id="vpic" alt="">
        <br>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="添加用户">
        </div>

    </form>
@endsection
@section('js')
    <script>
        function upFile() {
            let files = document.querySelector('#pic').files[0];
            let formData = new FormData()
            formData.append('_token',"{{csrf_token()}}")
            formData.append('file',files,files.name)
            let url = "{{route('Admin.index.file')}}"
            $.ajax({
                url,
                type:'POST',
                cache:false,
                processData:false,
                contentType:false,
                data:formData
            }).then(({status,pic})=>{
                $('#vpic').attr('src',pic);
            })
        }
    </script>
@endsection