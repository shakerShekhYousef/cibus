<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'full_name'=>'admin',
            'email'=>'admin@cibus.com',
            'password'=>Hash::make('secretadmin'),
            'email_verified_at'=>Carbon::now(),
            'mobile'=>'0999999999',
            'role_id'=>1
        ]);
        DB::table('users')->insert([
            'full_name'=>'restaurant',
            'email'=>'restaurant@cibus.com',
            'password'=>Hash::make('secretrestaurant'),
            'email_verified_at'=>Carbon::now(),
            'mobile'=>'0999999999',
            'role_id'=>2
        ]);
        DB::table('users')->insert([
            'full_name'=>'user',
            'email'=>'user@cibus.com',
            'password'=>Hash::make('secretuser'),
            'email_verified_at'=>Carbon::now(),
            'mobile'=>'0999999999',
            'role_id'=>Role::defaultRole()
        ]);
    }
}
