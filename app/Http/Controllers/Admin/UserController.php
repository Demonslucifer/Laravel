<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $_pagesize = 2;

    public function __construct() {
        $this->_pagesize = config('page.pagesize');
    }


    public function list(Request $request)
    {
        $data = $request->get('sch');
        $list = User::when($data,function ($query) use ($data){
            $query->where('username','like',"%{$data}%");
        })->paginate($this->_pagesize);
//        dump($list);
        return view('Admin.user.index', compact('list'));
    }

    public function create()
    {
        return view('Admin.user.create');
    }
    public function add(Request $request)
    {
        $post =$this->validate($request, [
            'username' => 'required|unique:user,username',
            'truename' => 'required',
            'password' => 'required',
            'email' => 'nullable|email',
            'qq' => 'required|max:11'
        ]);
//         $request->except(['_token']);
//        $post['createtime'] = time();
//        $post['tel'] = (int)$post['tel'];
        User::create($post);

        return redirect(route('Admin.index.list'))->with('success','创建成功');
    }

    public function update(int $id)
    {
        $info = User::where('id',$id)->first();
        return view('Admin.user.update',compact('info'));
    }

    public function edit(Request $request, int $id)
    {
        $post=$this->validate($request, [
            'username' => 'required|unique:users,username,' . $id,
            'truename' => 'required',
            'email' => 'nullable|email',
            'qq' => 'required|max:11'
        ]);

        User::where('id',$id)->update($post);
//        DB::table('user')->where('id', $id)->update($post);
        return redirect(route('Admin.index.list'))->with('success','修改成功');
    }

    public function del(Request $request, int $id)
    {
//        dump($request->get('ids'));exit;
        if($request->get('ids')){
            $ids = $request->get('ids');
//            dump($ids);
            User::destroy($ids);
            return ['status' => 101, 'msg' => '删除成功'];
        }else{
            User::destroy($id);

            return ['status' => 100, 'msg' => '删除成功'];
        }

    }

    public function huishou()
    {
        $list = User::onlyTrashed()->get();
        return view('Admin.user.huishou', compact('list'));
    }

    public function huifu(Request $request,int $id)
    {
        if($request->get('ids')){
            $ids = $request->get('ids');
//            dump($ids);
            User::onlyTrashed()->wherein('id',$ids)->get()->restore();
            return ['status' => 101, 'msg' => '恢复成功'];
        }else {
            User::onlyTrashed()->find($id)->restore();
            return ['status' => 100, 'msg' => '恢复成功'];
        }
    }
}
