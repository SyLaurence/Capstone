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
    	date_default_timezone_set('Asia/Hong_Kong');
        DB::table('limits')->insert([
        	'id' => 1,
            'user_id' => 1,
            'less_grave_no' => 5,
            'limit_of_grave' => 3,
            'created_at' => date("Y-m-d H:i:s",strtotime('now')),
            'updated_at' => date("Y-m-d H:i:s",strtotime('now'))
        ]);
        DB::table('limits')->insert([
        	'id' => 2,
            'user_id' => 1,
            'less_grave_no' => 10,
            'limit_of_grave' => 10,
            'created_at' => date("Y-m-d H:i:s",strtotime('now')),
            'updated_at' => date("Y-m-d H:i:s",strtotime('now'))
        ]);
        DB::table('limits')->insert([
        	'id' => 3,
            'user_id' => 1,
            'less_grave_no' => 0,
            'limit_of_grave' => 24,
            'created_at' => date("Y-m-d H:i:s",strtotime('now')),
            'updated_at' => date("Y-m-d H:i:s",strtotime('now'))
        ]);

        DB::table('users')->insert([
    		'username' => 'Syy',
            'first_name' => 'Laurence',
            'middle_name' => 'Gomez',
            'last_name' => 'Sy',
            'email' => 'sylaurence97@yahoo.com',
            'contact_no' => '09082212900',
            'password' => md5('password'),
            'level' => 0, // 0 - Admin, 1 - HR Staff, 2 - Appraiser
            'image_path' => 'images/default.jpg' 
    	]); 
    	DB::table('users')->insert([
    		'username' => 'Moi',
            'first_name' => 'Moises',
            'middle_name' => 'Menendez',
            'last_name' => 'Unisa',
            'email' => 'moisesunisa@yahoo.com',
            'contact_no' => '09082212900',
            'password' => md5('password'),
            'level' => 1, // 0 - Admin, 1 - HR Staff
            'image_path' => 'images/driver1.png' 
    	]); 

    }
}
