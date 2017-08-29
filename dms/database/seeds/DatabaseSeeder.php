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
    	//$this->call(UsersTableSeeder::class);

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

    	DB::table('company_brands')->insert([
        	'name' => 'Isarog',
            'description' => 'Bicol Isarog Inc.'
        ]);
        DB::table('company_brands')->insert([
        	'name' => 'Penafrancia',
            'description' => 'From Luzon to Visayas'
        ]);
        DB::table('company_brands')->insert([
        	'name' => 'OLSR',
            'description' => 'Our Lady of Saint Rafael'
        ]);

        DB::table('applicants')->insert([
            'user_id' => 1 // Wag na baguhin
        ]);

        DB::table('personal_infos')->insert([
        	'first_name' => 'Moises',
            'middle_name' => 'Menendez',
            'last_name' => 'Unisa',
            'sex' => 1, // 1 - Male, 0 - Female
            'citizenship' => 'Filipino',
            'dob' => '1997-04-20', // YYYY - MM - DD
            'pob' => 'Pasig',
            'weight' => 90.00, // 60
            'height' => 5.4, // 5.6
            'religion' => 'Roman Catholic',
            'sss_id' => 123123, // 123123
            'tin_id' => 123123, // 123123 
            'philhealth' => 123123, // 123123
            'pagibig' => 123123, // 123123
            'residence_type' => 0, // 0 - Rented, 1 - Living with parents, 2 - Mortgage, 3 - Onwed
            'image_path' => 'images/default.jpg', // images/filename.jpg
            'civil_status' => 1, // 0 - Single, 1 - Married, 2 - Widowed
            'contact_no' => "09082212900",
            'applicant_id' => 1 // Nagbabago din, kung ano yung id ng table na to, yung sya
        ]);

        DB::table('addresses')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
            'type' => 0, // 0 - Previous, 1 - Current, 2 - Permanent
            'address' => 'Taytay'
        ]);
        DB::table('addresses')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
            'type' => 1, // 0 - Previous, 1 - Current, 2 - Permanent
            'address' => 'Rizal'
        ]);
        DB::table('addresses')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
            'type' => 2, // 0 - Previous, 1 - Current, 2 - Permanent
            'address' => 'Pasig'
        ]);

        DB::table('work_experiences')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
            'name' => 'Isarog',
            'position' => 'Driver',
            'date_resigned' => '1998-12-12', // YYYY - MM - DD
            'contact_no' => '09483918347',
            'reason_for_leaving' => 'EOC'
        ]);
        DB::table('work_experiences')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
            'name' => 'PUP',
            'position' => 'Programmer',
            'date_resigned' => '2007-12-12', // YYYY - MM - DD
            'contact_no' => '09483918347',
            'reason_for_leaving' => 'EOC'
        ]);

        DB::table('professional_exams')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
            'date' => '2009-12-12', // YYYY - MM - DD
            'name' => 'LTO Free',
            'license_no' => '123123', // 123123
            'rating' => "Pass" // Pass, Fail
        ]);
        DB::table('professional_exams')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
            'date' => '2012-12-12', // YYYY - MM - DD
            'name' => 'LET',
            'license_no' => '123123', // 123123
            'rating' => "Fail" // Pass, Fail
        ]);

        DB::table('referers')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
            'name' => 'Jeremee',
            'occupation' => 'Designer',
            'address' => 'Pasig',
            'contact_no' => '09384234852'
        ]);
        DB::table('referers')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
            'name' => 'Steven',
            'occupation' => 'Driver',
            'address' => 'Pasig',
            'contact_no' => '09384234852'
        ]);

        DB::table('for_emergencies')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
        	'person_to_notify' => 'Adrian Ornido',
            'relationship' => 'Cousin',
            'address' => 'Sta Rosa',
            'contact_no' => '09482756277' 
        ]);

        DB::table('education_backgrounds')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
        	'level' => 0, // 0 - Grade School, 1 - HighSchool, 2 - College
            'school_name' => 'MyElem',
            'school_address' => 'Manila'
        ]);
        DB::table('education_backgrounds')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
        	'level' => 1, // 0 - Grade School, 1 - HighSchool, 2 - College
            'school_name' => 'MyHS',
            'school_address' => 'Manila'
        ]);
        DB::table('education_backgrounds')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
        	'level' => 2, // 0 - Grade School, 1 - HighSchool, 2 - College
            'school_name' => 'MyCollege',
            'school_address' => 'Manila'
        ]);

        DB::table('family_backgrounds')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
        	'relationship' => 0, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'John Unisa',
            'dob' => '1950-12-12', // YYYY - MM - DD
            'address' => 'Pasig'
        ]);
        DB::table('family_backgrounds')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
        	'relationship' => 1, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Naomi Unisa',
            'dob' => '1950-12-12', // YYYY - MM - DD
            'address' => 'Pasig'
        ]);
        DB::table('family_backgrounds')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
        	'relationship' => 2, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Maria Unisa',
            'dob' => '1997-12-12', // YYYY - MM - DD
            'address' => 'Pasig'
        ]);

        DB::table('family_backgrounds')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
        	'relationship' => 3, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Steven Unisa',
            'dob' => '2000-12-12', // YYYY - MM - DD
            'address' => 'Antipolo'
        ]);
        DB::table('family_backgrounds')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
        	'relationship' => 3, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Merry Unisa',
            'dob' => '1998-12-12', // YYYY - MM - DD
            'address' => 'Pasig'
        ]);

        DB::table('family_backgrounds')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
        	'relationship' => 4, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Bilbo Unisa',
            'dob' => '2020-12-12', // YYYY - MM - DD
            'address' => 'Pasig'
        ]);
        DB::table('family_backgrounds')->insert([
        	'personal_info_id' => 1, // Kung pang ilang record na sya
        	'relationship' => 4, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Sam Unisa',
            'dob' => '2025-12-12', // YYYY - MM - DD
            'address' => 'Pasig'
        ]);

        DB::table('designation_records')->insert([
        	'company_brand_id' => 1, // 1 - Isarog, 2 - Penafrancia, 3 - OLSR
            'applicant_id' => 1 // ID ng Personal Info
        ]);


        DB::table('activity_setups')->insert([
        	'name' => 'Screening',
            'stage_no' => 1, // Stage number 
            'number' => 1, // Pang ilang activity na sya dun sa stage
            'target_days' => 1, 
            'type' => 0, // 0 - Document, 1 - Evaluation, 2 - Interview
            'is_skippable' => 0 // 0 - No, 1 - Yes
        ]);

        DB::table('item_setups')->insert([
        	'activity_setup_id' => 1, // ID kung saang activity sya belong, Example: ID->1, Activity->RoadTest
            'name' => 'Check Tire',
            'severity' => 0, // 0 - Low, 1 - Medium, 2 - High
            'used_in' => 0 // 0 - Recruitment, 1 - Performance Evaluation
        ]);

        DB::table('criteria_setups')->insert([
        	'item_setup_id' => 1,
            'name' => 'Tire pressure',
            'severity' => 2 // 0 - Low, 1 - Medium, 2 - High
		]);
        DB::table('criteria_setups')->insert([
            'item_setup_id' => 1,
            'name' => 'Tire Spare',
            'severity' => 1 // 0 - Low, 1 - Medium, 2 - High
        ]);
    }
}
