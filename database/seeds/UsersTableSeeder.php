<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'first_name' => 'Mr',
            'last_name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@fixdesignbd.com',
            'phone' => '01911087057',
            'password' => bcrypt('rootadmin'),
            'street_address' => '140/10 Nirala R?A',
            'division' => '1',
            'district' => '5',
            'remember_token' => Str::random(50),
            'status' => '1',

        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'first_name' => 'Mr',
            'last_name' => 'Customer',
            'username' => 'customer',
            'email' => 'customer@fixdesignbd.com',
            'phone' => '01912761001',
            'password' => bcrypt('rootcustomer'),
            'street_address' => '140/10 Nirala R?A',
            'division' => '2',
            'district' => '3',
            'remember_token' => Str::random(50),
            'status' => '1',
        ]);
    }
}
