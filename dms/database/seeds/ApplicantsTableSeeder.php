<?php

use Illuminate\Database\Seeder;

class ApplicantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// FN , MN , LN
    	$name = array(
    		array('Moises','Menendez','Unisa'),
    		array('Steven','Cruz','Banas'),
    		array('Jose Maria','Reyes','Abreu'),
    		array('Louie','Santos','Singson'),
    		array('Rogelio','Bato','Dalisay'),
    		array('Rudolfo','Menji','del Pilar'),
    		array('Protacio','De la Paz','Rizal'),
    		array('Ponciano','Espejo','Billones'),
    		array('Vicente','Abenido','Crisostomo'),
    		array('Victorino','Bagunas','San Miguel'),
    		array('Jose','Polvorosa','Tan'),
    		array('Joselito','Bayotlang','Alzate'),
    		array('Armando','Malmureto','Libria'),
    		array('Ricardo Jose','Ocol','Melo'),
    		array('Juan','Natividad','Lopez'),
    		array('John Carl','Santiago','Menendez'),
    		array('Michael','De los Reyes','Gomez'),
    		array('Adrian','Baron','Pestanas'),
    		array('Tomas','Galang','Barok'),
    		array('Rodrigo','Marano','Milton')
    	);

    	// YYYY-MM-DD
    	$dob = array(
    		'1972-04-20',
    		'1973-11-20',
    		'1978-10-20',
    		'1976-9-20',
    		'1975-8-20',
    		'1974-7-20',
    		'1972-6-20',
    		'1972-6-20',
    		'1972-4-20',
    		'1990-3-20',
    		'1980-2-20',
    		'1979-1-20',
    		'1978-12-20',
    		'1977-11-20',
    		'1976-10-20',
    		'1975-9-20',
    		'1974-7-20',
    		'1973-6-20',
    		'1972-5-20',
    		'1971-4-20'
    		);

    	// 1 - 5
    	$buscom = array(1,2,1,2,4,4,2,1,3,4,1,2,5,2,5,1,1,3,5,4);

    	for($x = 0; $x< 20; $x++){
	        DB::table('applicants')->insert([
	            'user_id' => 1, // Wag na baguhin
	            'created_at' => date("Y-m-d H:i:s",strtotime('now')),
            	'updated_at' => date("Y-m-d H:i:s",strtotime('now'))
	        ]);

	        DB::table('personal_infos')->insert([
	        	'first_name' => $name[$x][0],
	            'middle_name' => $name[$x][1],
	            'last_name' => $name[$x][2],
	            'sex' => 1, // 1 - Male, 0 - Female
	            'citizenship' => 'Filipino',
	            'dob' => $dob[$x], // YYYY - MM - DD
	            'pob' => 'Pasig',
	            'weight' => 90.00, // 60
	            'height' => 5.4, // 5.6
	            'religion' => 'Roman Catholic',
	            'sss_id' => '04-0751449-0', // 123123
	            'tin_id' => '232-655-634-000', // 123123 
	            'philhealth' => '01-025131564-2', // 123123
	            'pagibig' => '1023-4567-8090', // 123123
	            'residence_type' => 0, // 0 - Rented, 1 - Living with parents, 2 - Mortgage, 3 - Onwed
	            'image_path' => 'images/default.jpg', // images/filename.jpg
	            'civil_status' => 1, // 0 - Single, 1 - Married, 2 - Widowed
	            'contact_no' => '09082212900',
	            'applicant_id' => $x+1 // Nagbabago din, kung ano yung id ng table na to, yung sya
	        ]);

	        DB::table('addresses')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	            'type' => 0, // 0 - Previous, 1 - Current, 2 - Permanent
	            'address' => 'Taytay'
	        ]);
	        DB::table('addresses')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	            'type' => 1, // 0 - Previous, 1 - Current, 2 - Permanent
	            'address' => 'Rizal'
	        ]);
	        DB::table('addresses')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	            'type' => 2, // 0 - Previous, 1 - Current, 2 - Permanent
	            'address' => 'Pasig'
	        ]);

	        DB::table('work_experiences')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	            'name' => 'Isarog',
	            'position' => 'Driver',
	            'date_resigned' => '1998-12-12', // YYYY - MM - DD
	            'contact_no' => '09483918347',
	            'reason_for_leaving' => 'EOC'
	        ]);
	        DB::table('work_experiences')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	            'name' => 'PUP',
	            'position' => 'Programmer',
	            'date_resigned' => '2007-12-12', // YYYY - MM - DD
	            'contact_no' => '09483918347',
	            'reason_for_leaving' => 'EOC'
	        ]);

	        DB::table('professional_exams')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	            'date' => '2009-12-12', // YYYY - MM - DD
	            'name' => 'LTO Free',
	            'license_no' => '123123', // 123123
	            'rating' => "Pass" // Pass, Fail
	        ]);
	        DB::table('professional_exams')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	            'date' => '2012-12-12', // YYYY - MM - DD
	            'name' => 'LET',
	            'license_no' => '123123', // 123123
	            'rating' => "Fail" // Pass, Fail
	        ]);

	        DB::table('referers')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	            'name' => 'Jeremee',
	            'occupation' => 'Designer',
	            'address' => 'Pasig',
	            'contact_no' => '09384234852'
	        ]);
	        DB::table('referers')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	            'name' => 'Steven',
	            'occupation' => 'Driver',
	            'address' => 'Pasig',
	            'contact_no' => '09384234852'
	        ]);

	        DB::table('for_emergencies')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	        	'person_to_notify' => 'Adrian Ornido',
	            'relationship' => 'Cousin',
	            'address' => 'Sta Rosa',
	            'contact_no' => '09482756277' 
	        ]);

	        DB::table('education_backgrounds')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	        	'level' => 0, // 0 - Grade School, 1 - HighSchool, 2 - College
	            'school_name' => 'MyElem',
	            'school_address' => 'Manila'
	        ]);
	        DB::table('education_backgrounds')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	        	'level' => 1, // 0 - Grade School, 1 - HighSchool, 2 - College
	            'school_name' => 'MyHS',
	            'school_address' => 'Manila'
	        ]);
	        DB::table('education_backgrounds')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	        	'level' => 2, // 0 - Grade School, 1 - HighSchool, 2 - College
	            'school_name' => 'MyCollege',
	            'school_address' => 'Manila'
	        ]);

	        DB::table('family_backgrounds')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	        	'relationship' => 0, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
	            'name' => 'John Unisa',
	            'dob' => '1950-12-12', // YYYY - MM - DD
	            'address' => 'Pasig'
	        ]);
	        DB::table('family_backgrounds')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	        	'relationship' => 1, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
	            'name' => 'Naomi Unisa',
	            'dob' => '1950-12-12', // YYYY - MM - DD
	            'address' => 'Pasig'
	        ]);
	        DB::table('family_backgrounds')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	        	'relationship' => 2, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
	            'name' => 'Maria Unisa',
	            'dob' => '1997-12-12', // YYYY - MM - DD
	            'address' => 'Pasig'
	        ]);

	        DB::table('family_backgrounds')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	        	'relationship' => 3, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
	            'name' => 'Steven Unisa',
	            'dob' => '2000-12-12', // YYYY - MM - DD
	            'address' => 'Antipolo'
	        ]);
	        DB::table('family_backgrounds')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	        	'relationship' => 3, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
	            'name' => 'Merry Unisa',
	            'dob' => '1998-12-12', // YYYY - MM - DD
	            'address' => 'Pasig'
	        ]);

	        DB::table('family_backgrounds')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	        	'relationship' => 4, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
	            'name' => 'Bilbo Unisa',
	            'dob' => '2020-12-12', // YYYY - MM - DD
	            'address' => 'Pasig'
	        ]);
	        DB::table('family_backgrounds')->insert([
	        	'personal_info_id' => $x+1, // Kung pang ilang record na sya
	        	'relationship' => 4, // 0 - Father, 1 - Mother, 2 - Spouse, 3 - Sibling, 4 - Children
	            'name' => 'Sam Unisa',
	            'dob' => '2025-12-12', // YYYY - MM - DD
	            'address' => 'Pasig'
	        ]);
	        
	        DB::table('designation_records')->insert([
	        	'company_brand_id' => $buscom[$x], // 1 - Isarog, 2 - Penafrancia, 3 - OLSR
	            'applicant_id' => $x+1 // ID ng Personal Info
	        ]);

	        DB::table('recruitments')->insert([
	            'applicant_id' => $x+1,
	            'created_at' => date("Y-m-d H:i:s",strtotime('now')),
            	'updated_at' => date("Y-m-d H:i:s",strtotime('now'))
	        ]);

	    }
    }
}
