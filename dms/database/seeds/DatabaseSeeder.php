<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(ActivitiesTableSeeder::class);
        $this->call(ApplicantsTableSeeder::class);
        $this->call(AttendanceTableSeeder::class);
        $this->call(BusTableSeeder::class);
        $this->call(HiredDriversTableSeeder::class);
        $this->call(LeavesTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        //$this->call(ApplicantsTableSeeder::class);
    	
    }
}
