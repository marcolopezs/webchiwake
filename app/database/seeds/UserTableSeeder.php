<?php

use Chiwake\Entities\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
    {

        User::create([
            'first_name' => 'Marco',
            'last_name'  => 'Lopez',
            'email'      => 'marcolopez49@hotmail.com',
            'password'   => '123456'
        ]);

    }

} 