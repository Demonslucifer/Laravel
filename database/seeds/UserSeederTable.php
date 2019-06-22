<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'username' => 'user' . $i,
                'password' => 'password_user' . $i,
                'truename' => '用户' . $i,
                'email' => 'user' . $i . '@aa.com',
                'qq' => $i
            ]);
        }

    }
}
