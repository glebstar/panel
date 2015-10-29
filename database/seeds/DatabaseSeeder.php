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
            'name' => 'admin',
            'email' => 'admin',
            // pass = admin2233
            'password' => '$2y$10$luP8H38sedi8C0OZzwFjTepTjsFLTNspX2hXyBYDbLA7LRs5sMeTC',
            'created_at' => '2015-10-29 03:35:12',
            'updated_at' => '2015-10-29 03:35:12',
            'role' => 'admin'
            ));
        
        User::create(array(
            'name' => 'Operator',
            'email' => 'op',
            // pass = 123456
            'password' => '$2y$10$Qcr7revqhYvYpzFQHwXXJe/hwgUb6HTXC0PpMwww8yQJwn.AqNlaS',
            'created_at' => '2015-10-29 03:35:12',
            'updated_at' => '2015-10-29 03:35:12',
            'role' => 'operator'
            ));
    }
}
