<?php

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$name = array('Initial Interview(Screening)','Road Test','Workshop','Apprenticeship','Line Familiarization','Medical Exam','Pre-Employment Requirements','SOG and HR Orientation','Pre-Employment Clearance','EVP/Treas. & Pres. Interview','ATM Forms','ID Forms/ New Hire Info Form','Insurance','Operations Orientation');
    	$stageno = array('1','1','2','3','3','4','4','5','5','5','5','5','5','6');
    	$targetdays = array('0','1','3','12','2','4','3','1','0','0','0','0','0','1');
    	$type = array(2,1,3,3,1,0,0,3,0,2,0,0,0,3);
    	$number = array(1,2,1,1,2,1,2,1,2,3,4,5,6,1);
    	for($x = 0; $x < count($name);$x++){
	        DB::table('activity_setups')->insert([
	            'name' => $name[$x],
	            'stage_no' => $stageno[$x],
	            'number' => $number[$x],
	            'target_days' => $targetdays[$x],
	            'type' => $type[$x],
	            'is_skippable' => 0,
	            'created_at' => date("Y-m-d",strtotime("now")),
	            'updated_at' => date("Y-m-d",strtotime("now"))
	        ]);
    	}
        // 0 - Appraisal , 2 - Road Test , 5 - Line Fam
        $actid = array(5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5);
        $factor = array();
    }
}
