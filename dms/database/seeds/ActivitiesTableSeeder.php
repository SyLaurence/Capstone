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
        $actid = array(2,5,0);
        $used = array(0,0,1);
        $factor = array(
            array(
                'Seat Position on Driver on Driver Seat',
                'Hand Position on Steering Wheel',
                'Using of lights',
                'Start in 1st Gear',
                'Reverse Habit',
                'Bus check before Driving',
                'Driving Skills on Long Drive with 1 to 6 Gear',
                'Observe Clearance Left and Right',
                'Observe Accelerating Habit',
                'Foot Brake Used'
                ),
            array(
                'Physical',
                'Reporting for duty on time',
                "Valid Driver's license",
                'Conducting Predeparture Check',
                'Proper Handling of Bus',
                "Road's Standard Rules",
                'Giving Right of Way',
                'Mannerly Behavior',
            ),
            array(
                'Grooming standards',
                'Interpersonal skills',
                'Initiative'
                )
            );

        for($ctr = 0; $ctr < count($actid); $ctr++){
            for($ctr1 = 0; $ctr1 < count($factor[$ctr]); $ctr1++){
                DB::table('item_setups')->insert([
                    'activity_setup_id' => $actid[$ctr],
                    'name' => $factor[$ctr][$ctr1],
                    'severity' => 0,
                    'used_in' => $used[$ctr],
                    'created_at' => date("Y-m-d H:i:s",strtotime('now')),
                    'updated_at' => date("Y-m-d H:i:s",strtotime('now'))
                ]);
            }
        }
        $arrfacID = array(11,14,15,16,17,18);
        $arrCrit = array(
            array(
                'Well Groomed'
                ),
            array(
                'Checks Tires',
                'Side Mirror Orientation'
                ),
            array(
                'Smooth Start',
                'Smooth Stop',
                'Proper Shifting of Gears',
                'Smooth Clutch Release',
                'Does Everything to Prevent Engine Wear'
                ),
            array(
                'Giving Sufficient Distance and Clearance Overtaking',
                'Sufficient Following Distance',
                'Driving in the Correct Lane'
                ),
            array(
                'Stopping at Designated Bus Stops',
                'Observing Traffic Signs and Signals'
                ),
            array(
                'Courteous to passengers and Co-employee',
                'Considerate to other vehicles and pedestrian'
                )
            );
        for($ctr = 0; $ctr < count($arrfacID) ;$ctr++){
            for($ctr1 = 0; $ctr1 < count($arrCrit[$ctr]); $ctr1++){
                DB::table('criteria_setups')->insert([
                    'item_setup_id' => $arrfacID[$ctr],
                    'name' => $arrCrit[$ctr][$ctr1],
                    'severity' => 0,
                    'created_at' => date("Y-m-d H:i:s",strtotime('now')),
                    'updated_at' => date("Y-m-d H:i:s",strtotime('now'))
                ]);
            }
        }

        $arrfacID = array(3,6);
        $arrCrit = array(
            array(
                'check Tires',
                'check Engine'
                ),
            array(
                'hazard light',
                'signal lights'
                )
            );
        for($ctr = 0; $ctr < count($arrfacID) ;$ctr++){
            for($ctr1 = 0; $ctr1 < count($arrCrit[$ctr]); $ctr1++){
                DB::table('criteria_setups')->insert([
                    'item_setup_id' => $arrfacID[$ctr],
                    'name' => $arrCrit[$ctr][$ctr1],
                    'severity' => 0,
                    'created_at' => date("Y-m-d H:i:s",strtotime('now')),
                    'updated_at' => date("Y-m-d H:i:s",strtotime('now'))
                ]);
            }
        }

        $arrfacID = array(3,6);
        $arrCrit = array(
            array(
                'Complete Uniform',
                'Clean Haircut'
                ),
            array(
                'Submission to Authorities'
                ),
            array(
                'Enthusiasm to Work',
                'Opennes to Give and Receive Feedback',
                'Dependability',
                'Reliability'
                )
            );
        for($ctr = 0; $ctr < count($arrfacID) ;$ctr++){
            for($ctr1 = 0; $ctr1 < count($arrCrit[$ctr]); $ctr1++){
                DB::table('criteria_setups')->insert([
                    'item_setup_id' => $arrfacID[$ctr],
                    'name' => $arrCrit[$ctr][$ctr1],
                    'severity' => 0,
                    'created_at' => date("Y-m-d H:i:s",strtotime('now')),
                    'updated_at' => date("Y-m-d H:i:s",strtotime('now'))
                ]);
            }
        }

    }
}
