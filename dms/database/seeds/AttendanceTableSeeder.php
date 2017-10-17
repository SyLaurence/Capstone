<?php

use Illuminate\Database\Seeder;

class AttendanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = array(70,100,90);
    	$arrA = array(2,1,3);
    	for($ctr = 0; $ctr < count($arr); $ctr++){
	    	for($x = 0; $x<$arr[$ctr]; $x++){
		        DB::table('attendances')->insert([
		            'user_id' => 1,
		            'applicant_id' => $arrA[$ctr],
		            'bus_no' => 'ABC123',
		            'from' => 'Cubao',
		            'to' => 'Bicol',
		            'status' => 1,
		            'comment' => 'Good',
		            'created_at' => date("Y-m-d H:i:s",strtotime("-4 months", strtotime("now"))),
		        	'updated_at' => date("Y-m-d H:i:s",strtotime('now'))
		        ]);
		    }
		}
    }
}
