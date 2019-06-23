<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/23
 * Time: 20:35
 */

namespace App\Models\Tags;


trait Btn
{
    public function delBtn()
    {
        if(session('admin.user')->id != $this->id){
            return '<a class="btn btn-danger del" href="'.route('Admin.index.del',$this->id).'">删除</a>';
        }
        return '<a class="btn btn-danger del disabled" aria-disabled="true"  href="'.route('Admin.index.del',$this->id).'">删除</a>';
//        return '';
    }
}