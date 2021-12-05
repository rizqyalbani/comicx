<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data               = new User();
        $data->name         = "Admin";
        $data->email        = "ryanadhitama2@gmail.com";
        $data->password     = Hash::make($data['comic92021']);
        $data->isAdmin      = 1;
        $data->save();
    }
}
