<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name                 =   "admin";
        $user->email                =   "admin@admin.com";
        $user->password             =   Hash::make("admin");
        $user->decrypted_password   =   "admin";
        $user->status               =   1;
        $user->approved             =   1;
        $user->save();
    }
}
