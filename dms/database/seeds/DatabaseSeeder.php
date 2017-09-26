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
        //$this->call(ActivitiesTableSeeder::class);
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
       DB::table('company_brands')->insert([
         'name' => 'RSL',
            'description' => '100% Pure Loyalty'
        ]);
        // Loop
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
        // Loop
        DB::table('designation_records')->insert([
        	'company_brand_id' => 1, // 1 - Isarog, 2 - Penafrancia, 3 - OLSR
            'applicant_id' => 1 // ID ng Personal Info
        ]);

        DB::table('applicants')->insert([
            'user_id' => 1 // Wag na baguhin
        ]);

        DB::table('personal_infos')->insert([
            'first_name' => 'Mark Steven',
            'middle_name' => 'Cruz',
            'last_name' => 'Banyas',
            'sex' => 1, // 1 - Male, 0 - Female
            'citizenship' => 'Filipino',
            'dob' => '1997-05-23', // YYYY - MM - DD
            'pob' => 'Pateros',
            'weight' => 60.00, // 60
            'height' => 5.6, // 5.6
            'religion' => 'Roman Catholic',
            'sss_id' => 111111, // 123123
            'tin_id' => 111111, // 123123 
            'philhealth' => 111111, // 123123
            'pagibig' => 111111, // 123123
            'residence_type' => 0, // 0 - Rented, 1 - Living with parents, 2 - Mortgage, 3 - Onwed
            'image_path' => 'images/default.jpg', // images/filename.jpg
            'civil_status' => 0, // 0 - Single, 1 - Married, 2 - Widowed
            'contact_no' => "09082212900",
            'applicant_id' => 2 // Nagbabago din, kung ano yung id ng table na to, yung sya
        ]);

        DB::table('addresses')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'type' => 0, // 0 - Previous, 1 - Current, 2 - Permanent
            'address' => 'Taytay'
        ]);
        DB::table('addresses')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'type' => 1, // 0 - Previous, 1 - Current, 2 - Permanent
            'address' => 'Pateros'
        ]);
        DB::table('addresses')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'type' => 2, // 0 - Previous, 1 - Current, 2 - Permanent
            'address' => 'Pateros'
        ]);

        DB::table('work_experiences')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'name' => 'Isarog',
            'position' => 'Driver',
            'date_resigned' => '2014-12-12', // YYYY - MM - DD
            'contact_no' => '09483918347',
            'reason_for_leaving' => 'EOC'
        ]);
        DB::table('work_experiences')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'name' => 'Accenture',
            'position' => 'Programmer',
            'date_resigned' => '2015-12-12', // YYYY - MM - DD
            'contact_no' => '09483918347',
            'reason_for_leaving' => 'EOC'
        ]);

        DB::table('professional_exams')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'date' => '2009-12-12', // YYYY - MM - DD
            'name' => 'LTO Free',
            'license_no' => '123123', // 123123
            'rating' => "Pass" // Pass, Fail
        ]);
        DB::table('professional_exams')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'date' => '2010-12-12', // YYYY - MM - DD
            'name' => 'LET',
            'license_no' => '123123', // 123123
            'rating' => "Fail" // Pass, Fail
        ]);

        DB::table('referers')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'name' => 'Jeremee',
            'occupation' => 'Designer',
            'address' => 'Pasig',
            'contact_no' => '09384234852'
        ]);
        DB::table('referers')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'name' => 'Miguel',
            'occupation' => 'Driver',
            'address' => 'Makati',
            'contact_no' => '09384231234'
        ]);

        DB::table('for_emergencies')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'person_to_notify' => 'Jomar Cruz',
            'relationship' => 'Cousin',
            'address' => 'Siniloan',
            'contact_no' => '09482756277' 
        ]);

        DB::table('education_backgrounds')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'level' => 0, // 0 - Grade School, 1 - HighSchool, 2 - College
            'school_name' => 'San Francisco Elementary School',
            'school_address' => 'Pasig'
        ]);
        DB::table('education_backgrounds')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'level' => 1, // 0 - Grade School, 1 - HighSchool, 2 - College
            'school_name' => 'Pateros National High School',
            'school_address' => 'Pateros'
        ]);
        DB::table('education_backgrounds')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'level' => 2, // 0 - Grade School, 1 - HighSchool, 2 - College
            'school_name' => 'PUP',
            'school_address' => 'Manila'
        ]);

        DB::table('family_backgrounds')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'relationship' => 0, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Patrick Banyas',
            'dob' => '1950-12-12', // YYYY - MM - DD
            'address' => 'Pateros'
        ]);
        DB::table('family_backgrounds')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'relationship' => 1, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Hazel Banyas',
            'dob' => '1950-10-12', // YYYY - MM - DD
            'address' => 'Pateros'
        ]);
        DB::table('family_backgrounds')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'relationship' => 3, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Sunshine Banyas',
            'dob' => '1998-12-12', // YYYY - MM - DD
            'address' => 'Pateros'
        ]);

        DB::table('family_backgrounds')->insert([
            'personal_info_id' => 2, // Kung pang ilang record na sya
            'relationship' => 3, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Skyla Banyas',
            'dob' => '2000-12-12', // YYYY - MM - DD
            'address' => 'Pateros'
        ]);

        DB::table('designation_records')->insert([
            'company_brand_id' => 2, // 1 - Isarog, 2 - Penafrancia, 3 - OLSR
            'applicant_id' => 2 // ID ng Personal Info
        ]);

        DB::table('applicants')->insert([
            'user_id' => 1 // Wag na baguhin
        ]);

        DB::table('personal_infos')->insert([
            'first_name' => 'Miguel Paolo',
            'middle_name' => 'Ritual',
            'last_name' => 'Turgo',
            'sex' => 1, // 1 - Male, 0 - Female
            'citizenship' => 'Filipino',
            'dob' => '1980-05-23', // YYYY - MM - DD
            'pob' => 'Muzon',
            'weight' => 45.00, // 60
            'height' => 5.0, // 5.6
            'religion' => 'Roman Catholic',
            'sss_id' => 22222, // 123123
            'tin_id' => 22222, // 123123 
            'philhealth' => 222222, // 123123
            'pagibig' => 222222, // 123123
            'residence_type' => 3, // 0 - Rented, 1 - Living with parents, 2 - Mortgage, 3 - Onwed
            'image_path' => 'images/default.jpg', // images/filename.jpg
            'civil_status' => 1, // 0 - Single, 1 - Married, 2 - Widowed
            'contact_no' => "09082212390",
            'applicant_id' => 3 // Nagbabago din, kung ano yung id ng table na to, yung sya
        ]);

        DB::table('addresses')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'type' => 0, // 0 - Previous, 1 - Current, 2 - Permanent
            'address' => 'Muzon'
        ]);
        DB::table('addresses')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'type' => 1, // 0 - Previous, 1 - Current, 2 - Permanent
            'address' => 'Taytay'
        ]);
        DB::table('addresses')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'type' => 2, // 0 - Previous, 1 - Current, 2 - Permanent
            'address' => 'Taytay'
        ]);

        DB::table('work_experiences')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'name' => 'OLSR',
            'position' => 'Security Guard',
            'date_resigned' => '2010-12-12', // YYYY - MM - DD
            'contact_no' => '09987918347',
            'reason_for_leaving' => 'EOC'
        ]);
        DB::table('work_experiences')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'name' => 'Cityland',
            'position' => 'Personal Driver',
            'date_resigned' => '2012-12-12', // YYYY - MM - DD
            'contact_no' => '09483918347',
            'reason_for_leaving' => 'EOC'
        ]);

        DB::table('professional_exams')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'date' => '1999-12-12', // YYYY - MM - DD
            'name' => 'LTO Free',
            'license_no' => '123123', // 123123
            'rating' => "Pass" // Pass, Fail
        ]);
        DB::table('professional_exams')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'date' => '2000-10-12', // YYYY - MM - DD
            'name' => 'LET',
            'license_no' => '123123', // 123123
            'rating' => "Fail" // Pass, Fail
        ]);

        DB::table('referers')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'name' => 'Ivan',
            'occupation' => 'Programmer',
            'address' => 'Towerhills',
            'contact_no' => '09381234852'
        ]);
        DB::table('referers')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'name' => 'Laurence',
            'occupation' => 'Manager',
            'address' => 'Makati',
            'contact_no' => '09384256744'
        ]);

        DB::table('for_emergencies')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'person_to_notify' => 'Jake',
            'relationship' => 'Teacher',
            'address' => 'Binangonan',
            'contact_no' => '09768756277' 
        ]);

        DB::table('education_backgrounds')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'level' => 0, // 0 - Grade School, 1 - HighSchool, 2 - College
            'school_name' => 'Muzon Elementary School',
            'school_address' => 'Muzon'
        ]);
        DB::table('education_backgrounds')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'level' => 1, // 0 - Grade School, 1 - HighSchool, 2 - College
            'school_name' => 'Muzon National High School',
            'school_address' => 'Pateros'
        ]);
        DB::table('education_backgrounds')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'level' => 2, // 0 - Grade School, 1 - HighSchool, 2 - College
            'school_name' => 'URS',
            'school_address' => 'Morong'
        ]);

        DB::table('family_backgrounds')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'relationship' => 0, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Angelo Turgo',
            'dob' => '1955-12-10', // YYYY - MM - DD
            'address' => 'Muzon'
        ]);
        DB::table('family_backgrounds')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'relationship' => 1, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Hannah Turgo',
            'dob' => '1954-11-12', // YYYY - MM - DD
            'address' => 'Muzon'
        ]);
        DB::table('family_backgrounds')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'relationship' => 2, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Camille Turgo',
            'dob' => '1980-05-12', // YYYY - MM - DD
            'address' => 'Muzon'
        ]);

        DB::table('family_backgrounds')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'relationship' => 3, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Michelle Turgo',
            'dob' => '2089-01-12', // YYYY - MM - DD
            'address' => 'Muzon'
        ]);
        DB::table('family_backgrounds')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'relationship' => 3, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Marianne Turgo',
            'dob' => '1990-07-12', // YYYY - MM - DD
            'address' => 'Pasig'
        ]);

        DB::table('family_backgrounds')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'relationship' => 4, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Mandara Turgo',
            'dob' => '2015-10-12', // YYYY - MM - DD
            'address' => 'Muzon'
        ]);
        DB::table('family_backgrounds')->insert([
            'personal_info_id' => 3, // Kung pang ilang record na sya
            'relationship' => 4, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
            'name' => 'Jillian Turgo',
            'dob' => '2016-05-12', // YYYY - MM - DD
            'address' => 'Muzon'
        ]);

        DB::table('designation_records')->insert([
            'company_brand_id' => 3, // 1 - Isarog, 2 - Penafrancia, 3 - OLSR
            'applicant_id' => 3 // ID ng Personal Info
        ]);
        // Loop
        DB::table('recruitments')->insert([
            'applicant_id' => 1
            
        ]);
        DB::table('recruitments')->insert([
            'applicant_id' => 2
        ]);
        DB::table('recruitments')->insert([
            'applicant_id' => 3
        ]);
        // Loop
        DB::table('activity_setups')->insert([
        	'name' => 'Birth Certificate',
            'stage_no' => 1, // Stage number 
            'number' => 1, // Pang ilang activity na sya dun sa stage
            'target_days' => 1, 
            'type' => 0, // 0 - Document, 1 - Evaluation, 2 - Interview
            'is_skippable' => 0 // 0 - No, 1 - Yes
        ]);
        DB::table('activity_setups')->insert([
            'name' => 'Medical Certificate',
            'stage_no' => 2, // Stage number 
            'number' => 1, // Pang ilang activity na sya dun sa stage
            'target_days' => 1, 
            'type' => 0, // 0 - Document, 1 - Evaluation, 2 - Interview
            'is_skippable' => 0 // 0 - No, 1 - Yes
        ]);
        DB::table('activity_setups')->insert([
            'name' => 'Road Test',
            'stage_no' => 1, // Stage number 
            'number' => 2, // Pang ilang activity na sya dun sa stage
            'target_days' => 5, 
            'type' => 1, // 0 - Document, 1 - Evaluation, 2 - Interview
            'is_skippable' => 0 // 0 - No, 1 - Yes
        ]);
        DB::table('activity_setups')->insert([
            'name' => 'Admin Interview',
            'stage_no' => 3, // Stage number 
            'number' => 1, // Pang ilang activity na sya dun sa stage
            'target_days' => 1, 
            'type' => 2, // 0 - Document, 1 - Evaluation, 2 - Interview
            'is_skippable' => 0 // 0 - No, 1 - Yes
        ]);
        DB::table('activity_setups')->insert([
            'name' => 'Line Familiarization',
            'stage_no' => 2, // Stage number 
            'number' => 2, // Pang ilang activity na sya dun sa stage
            'target_days' => 12, 
            'type' => 1, // 0 - Document, 1 - Evaluation, 2 - Interview
            'is_skippable' => 0 // 0 - No, 1 - Yes
        ]);

        DB::table('item_setups')->insert([
        	'activity_setup_id' => 3, // ID kung saang activity sya belong, Example: ID->1, Activity->RoadTest
            'name' => 'Lights',
            'severity' => 2, // 0 - Low, 1 - Medium, 2 - High
            'used_in' => 0 // 0 - Recruitment, 1 - Performance Evaluation
        ]);
        DB::table('item_setups')->insert([
            'activity_setup_id' => 3, // ID kung saang activity sya belong, Example: ID->1, Activity->RoadTest
            'name' => 'Reverse Habit',
            'severity' => 1, // 0 - Low, 1 - Medium, 2 - High
            'used_in' => 0 // 0 - Recruitment, 1 - Performance Evaluation
        ]);
        DB::table('item_setups')->insert([
            'activity_setup_id' => 3, // ID kung saang activity sya belong, Example: ID->1, Activity->RoadTest
            'name' => 'Seat Position',
            'severity' => 1, // 0 - Low, 1 - Medium, 2 - High
            'used_in' => 0 // 0 - Recruitment, 1 - Performance Evaluation
        ]);

        DB::table('criteria_setups')->insert([
        	'item_setup_id' => 1,
            'name' => 'Use hazard lights',
            'severity' => 2 // 0 - Low, 1 - Medium, 2 - High
		]);
        DB::table('criteria_setups')->insert([
            'item_setup_id' => 1,
            'name' => 'Use Blinkers',
            'severity' => 1 // 0 - Low, 1 - Medium, 2 - High
        ]);
        DB::table('criteria_setups')->insert([
            'item_setup_id' => 1,
            'name' => 'Uses lights when turning',
            'severity' => 1 // 0 - Low, 1 - Medium, 2 - High
        ]);

        DB::table('criteria_setups')->insert([
            'item_setup_id' => 2,
            'name' => 'Set parking brake',
            'severity' => 1 // 0 - Low, 1 - Medium, 2 - High
        ]);
        DB::table('criteria_setups')->insert([
            'item_setup_id' => 2,
            'name' => 'Reverse gear then brake',
            'severity' => 2 // 0 - Low, 1 - Medium, 2 - High
        ]);

        DB::table('criteria_setups')->insert([
            'item_setup_id' => 3,
            'name' => 'Wearing seatbelt',
            'severity' => 2 // 0 - Low, 1 - Medium, 2 - High
        ]);
        DB::table('criteria_setups')->insert([
            'item_setup_id' => 3,
            'name' => 'Proper adjustment of driver seat',
            'severity' => 1 // 0 - Low, 1 - Medium, 2 - High
        ]);


        DB::table('item_setups')->insert([
            'activity_setup_id' => 5, // ID kung saang activity sya belong, Example: ID->1, Activity->RoadTest
            'name' => 'Check bus parts',
            'severity' => 2, // 0 - Low, 1 - Medium, 2 - High
            'used_in' => 0 // 0 - Recruitment, 1 - Performance Evaluation
        ]);
        DB::table('item_setups')->insert([
            'activity_setup_id' => 5, // ID kung saang activity sya belong, Example: ID->1, Activity->RoadTest
            'name' => 'Giving right of way',
            'severity' => 2, // 0 - Low, 1 - Medium, 2 - High
            'used_in' => 0 // 0 - Recruitment, 1 - Performance Evaluation
        ]);
        DB::table('item_setups')->insert([
            'activity_setup_id' => 5, // ID kung saang activity sya belong, Example: ID->1, Activity->RoadTest
            'name' => 'Reporting on duty on time',
            'severity' => 1, // 0 - Low, 1 - Medium, 2 - High
            'used_in' => 0 // 0 - Recruitment, 1 - Performance Evaluation
        ]);
        DB::table('item_setups')->insert([
            'activity_setup_id' => 5, // ID kung saang activity sya belong, Example: ID->1, Activity->RoadTest
            'name' => 'Smooth Starting',
            'severity' => 2, // 0 - Low, 1 - Medium, 2 - High
            'used_in' => 0 // 0 - Recruitment, 1 - Performance Evaluation
        ]);
        DB::table('item_setups')->insert([
            'activity_setup_id' => 5, // ID kung saang activity sya belong, Example: ID->1, Activity->RoadTest
            'name' => 'Smooth Stoping',
            'severity' => 2, // 0 - Low, 1 - Medium, 2 - High
            'used_in' => 0 // 0 - Recruitment, 1 - Performance Evaluation
        ]);

        DB::table('criteria_setups')->insert([
            'item_setup_id' => 4,
            'name' => 'Checks Battery',
            'severity' => 2 // 0 - Low, 1 - Medium, 2 - High
        ]);
        DB::table('criteria_setups')->insert([
            'item_setup_id' => 4,
            'name' => 'Checks Steering',
            'severity' => 2 // 0 - Low, 1 - Medium, 2 - High
        ]);
        DB::table('criteria_setups')->insert([
            'item_setup_id' => 4,
            'name' => 'Checks Brake',
            'severity' => 2 // 0 - Low, 1 - Medium, 2 - High
        ]);
        DB::table('criteria_setups')->insert([
            'item_setup_id' => 4,
            'name' => 'Checks Lights',
            'severity' => 2 // 0 - Low, 1 - Medium, 2 - High
        ]);

        DB::table('criteria_setups')->insert([
            'item_setup_id' => 5,
            'name' => 'Driving in the correct lane',
            'severity' => 1 // 0 - Low, 1 - Medium, 2 - High
        ]);
        DB::table('criteria_setups')->insert([
            'item_setup_id' => 5,
            'name' => 'Considerate to other vehicles',
            'severity' => 1 // 0 - Low, 1 - Medium, 2 - High
        ]);

        DB::table('item_setups')->insert([ // 9
            'activity_setup_id' => 0, // ID kung saang activity sya belong, Example: ID->1, Activity->RoadTest
            'name' => 'Attendance and Punctuality',
            'severity' => 1, // 0 - Low, 1 - Medium, 2 - High
            'used_in' => 1 // 0 - Recruitment, 1 - Performance Evaluation
        ]);
        DB::table('criteria_setups')->insert([
            'item_setup_id' => 9,
            'name' => 'Completes working hours',
            'severity' => 1 // 0 - Low, 1 - Medium, 2 - High
        ]);
        DB::table('criteria_setups')->insert([
            'item_setup_id' => 9,
            'name' => 'On time',
            'severity' => 1 // 0 - Low, 1 - Medium, 2 - High
        ]);

        DB::table('item_setups')->insert([ // 10
            'activity_setup_id' => 0, // ID kung saang activity sya belong, Example: ID->1, Activity->RoadTest
            'name' => 'Initiative',
            'severity' => 1, // 0 - Low, 1 - Medium, 2 - High
            'used_in' => 1 // 0 - Recruitment, 1 - Performance Evaluation
        ]);
        DB::table('criteria_setups')->insert([
            'item_setup_id' => 10,
            'name' => 'Heart of Service',
            'severity' => 1 // 0 - Low, 1 - Medium, 2 - High
        ]);
        DB::table('criteria_setups')->insert([
            'item_setup_id' => 10,
            'name' => 'Can work with minimum supervision',
            'severity' => 1 // 0 - Low, 1 - Medium, 2 - High
        ]);

        DB::table('item_setups')->insert([ // 11
            'activity_setup_id' => 0, // ID kung saang activity sya belong, Example: ID->1, Activity->RoadTest
            'name' => 'Customer Relations',
            'severity' => 1, // 0 - Low, 1 - Medium, 2 - High
            'used_in' => 1 // 0 - Recruitment, 1 - Performance Evaluation
        ]);
        DB::table('criteria_setups')->insert([
            'item_setup_id' => 11,
            'name' => 'Respectful to passengers',
            'severity' => 2 // 0 - Low, 1 - Medium, 2 - High
        ]);

        DB::table('item_setups')->insert([ // 12
            'activity_setup_id' => 0, // ID kung saang activity sya belong, Example: ID->1, Activity->RoadTest
            'name' => 'Flexibility',
            'severity' => 2, // 0 - Low, 1 - Medium, 2 - High
            'used_in' => 1 // 0 - Recruitment, 1 - Performance Evaluation
        ]);

    }
}
