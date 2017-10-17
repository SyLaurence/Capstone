<?php

use Illuminate\Database\Seeder;

class LeavesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x = 1 ;$x<=8;$x++){
        	DB::table('applicant_leaves')->insert([
		            'user_id' => 1,
		            'applicant_id' => $x,
		            'days' => 0,
		            'is_avalable' => 1,
		            'start_date' => date("Y-m-d H:i:s",strtotime('now')),
		            'created_at' => date("Y-m-d H:i:s",strtotime('now')),
		        	'updated_at' => date("Y-m-d H:i:s",strtotime('now'))
		        ]);
        }
    }
}
