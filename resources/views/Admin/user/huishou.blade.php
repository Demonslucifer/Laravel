@extends('layouts.admin')


@section('title','回收站')
@section('css')
    <style>
        .form-inline{
            float: left;
        }
        .text-right{
            margin-bottom: 10px;
        }
    </style>
@endsection
@section('cnt')
<div>
    <h1>回收站</h1>

</div>
    <div class="text-right">

        <form class="form-inline" action="{{route('Admin.index.huishou')}}">
            <input class="form-control mr-sm-2 val" type="search" placeholder="" name="sch" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0 search" type="submit">搜索</button>
        </form>
        <a class="btn btn-danger" href="{{route('Admin.index.list')}}">返回</a>
    </div>

    <table class="table table-bordered">
        <thead>
        <th><input type="checkbox" class="checkbox-inline" onclick="checkAll(this)"></th>
        <th>ID</th>
        <th>用户名</th>
        <th>真实姓名</th>
        <th>邮箱</th>
        <th>QQ</th>
        <th>创建时间</th>
        <th>操作</th>
        </thead>
        <tbody>
        @forelse($list as $val)
            <tr>
                <td><input type="checkbox" class="check" name="item[]" value="{{ $val->id }}" id=""></td>
                <td>{{$val->id}}</td>
                <td>{{$val->username}}</td>
                <td>{{$val->truename}}</td>
                <td>{{$val->email}}</td>
                <td>{{$val->qq}}</td>
                <td>{{$val->created_at}}</td>
                <td>
                    <a class="btn btn-primary hf" href="{{route('Admin.index.huifu',['id'=>$val->id])}}">恢复</a>
                    <a class="btn btn-danger del" href="{{route('Admin.index.del',['id'=>$val->id])}}">删除</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">暂无数据</td>
            </tr>
        @endforelse
        </tbody>
    </table>
{{--{{ $list->appends(request()->except(['page']))->links() }}--}}
    <a class="btn btn-danger allhf" href="{{route('Admin.index.huifu',['id'=>1])}}">全部恢复</a>

@endsection

@section('js')
    <script>
        $('.hf').click(function (evt) {
            evt.preventDefault();
            let url = $(this).attr('href');
            if (confirm('是否恢复此用户')) {
                $.ajax({
                    url,
                    data: {
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    type: 'PUT'
                }).then(back => {
                    // console.log(back)
                    if (back.status == 100) {
                        // console.log($(this))
                        $(this).parents('tr').remove();
                    }
                })

            }
        })

        var ck = $('.check');

        function checkAll(qx) {
            if (qx.checked) {
                for (var i = 0; i < ck.length; i++) {          // 实现全选
                    ck[i].setAttribute("checked", "checked");
                }
            } else {
                for (var i = 0; i < ck.length; i++) {         // 取消全选
                    ck[i].removeAttribute("checked");
                }
            }
        }

        $('.allhf').click(function (evt) {
            evt.preventDefault();
            var items = [];
            // for (var i=0; i<ck.length; i++) {
            //     if (ck[i].checked) {
            //         items.push(ck[i].value);        // 将id都放进数组
            //     }
            // }
            // console.log(items);
            // var iten = [];
            $('input[name="item[]"]:checked').each((index, item) => {
                items.push(item.value);
                // console.log(item)
                // iten.push(item)
            });
            if (items == null || items.length == 0)        // 当没选的时候，不做任何操作
            {
                return false;
            }
            // console.log(items);
            let url = $(this).attr('href');
            if (confirm('是否恢复选中用户')) {
                $.ajax({
                    url,
                    data: {
                        _token: '{{csrf_token()}}',
                        ids: items
                    },
                    dataType: 'json',
                    type: 'PUT'
                }).then(back => {
                    // console.log(back)
                    if (back.status == 101) {
                        // console.log($('input[name="item[]"]:checked'))
                        $('input[name="item[]"]:checked').parents('tr').remove();
                    }
                })

            }
            return false

        })
    </script>

@endsection