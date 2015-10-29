<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'name' => 'Admin',
            'login' => 'admin',
            'password' => bcrypt('admin2233'),
            'role' => 1
            ));
        
        User::create(array(
            'name' => 'Operator',
            'login' => 'op',
            'password' => bcrypt('123456'),
            'role' => 2
            ));
    }
}
