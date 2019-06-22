<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            // 用户名
            $table->string('username',50)->default('')->unique()->comment('用户名');
            // 密码
            $table->char('password',32)->comment('密码');
            // 邮箱
            $table->string('email',100)->default('')->comment('邮箱');
            // 真实姓名
            $table->string('truename',50)->default('未知')->comment('真实姓名');
            // qq
            $table->string('qq',11)->default('')->comment('qq');
            $table->timestamps();
            // 软删除字段标识
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
