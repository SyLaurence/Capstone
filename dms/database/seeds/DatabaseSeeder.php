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
        DB::table('applicants')->insert([
            'user_id' => 1
        ]);

        DB::table('activity_setups')->insert([
        	'name' => 'Screening',
            'stage_no' => 1,
            'number' => 1,
            'target_days' => 1,
            'type' => 0,
            'is_skippable' => 0
        ]);
    }
}
