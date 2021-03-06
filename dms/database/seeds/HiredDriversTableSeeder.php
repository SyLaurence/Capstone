<?php

use Illuminate\Database\Seeder;

class HiredDriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$arrS = array(2,2,2,2,2,0,0,0);
        for($x = 1 ;$x<=8;$x++){
        	DB::table('applicant_leaves')->insert([
		            'applicant_id' => $x,
		            'status' => $arrS[$x-1],
		            'created_at' => date("Y-m-d H:i:s",strtotime("-5 months", strtotime("now"))),
		        	'updated_at' => date("Y-m-d H:i:s",strtotime('now'))
		        ]);
        }
    }
}
