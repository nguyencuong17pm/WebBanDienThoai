<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('db_users')->insert([
        	[
        		'name'=>'admin',
        		'email'=>'admin@gmail.com',
        		'password'=>bcrypt('1234'),
        		'level'=>1,
        	],
        	[
        		'name'=>'nqThai',
        		'email'=>'nqThai@gmail.com',
        		'password'=>bcrypt('1234'),
        		'level'=>1,
        	],
        ]);
    }
}
