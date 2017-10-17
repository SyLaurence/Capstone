<?php

use Illuminate\Database\Seeder;

class BusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$arrName = array('RSL','Penafrancia','OLSR','Pintados','Bicol Isarog');
    	$arrDesc = array('Available all the time','100% Loyalty','Our Lady of St. Rafael','From Visayas to Luzon','Central Company');
       	foreach($ctr = 0; $ctr < 5 ; $ctr++){
       		DB::table('company_brands')->insert([
	         	'name' => $arrName[$ctr],
	            'description' => $arrDesc[$ctr]
	        ]);
       	}
    }
}
