<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$arrQ = array(
    		'Saang lugar ka dapat hindi lumusot(overtake)?',
    		'Ang lisensya ay maaaring ipagamit sa iba?',
    		'Ang sasakyan ay nakaparada(parked) kung?',
    		'Saang lugar hindi maaaraing pumarada?',
    		'Ano ang kahulugan ng kulay pulang ilaw trapiko?',
    		'Ang pagkakaroon ng isang lisensya ay isang?',
    		'Ang dalawang dilaw na linya na tuloy-tuloy ay palatandaan na?'
    		);
    	$arrC = array(
    		array(
    			'Tama lahat ang sagot',
    			'Sa paanan ng tulay',
    			'Sa mga sangandaan o interseksyon'
    			),
    		array(
    			'Kung may gustong mag aral magmaneho',
    			'Kung may biglaang pangyayari o pangangailangan',
    			'Hindi pinapayagan kailanman'
    			),
    		array(
    			'Nakatigil ng matagal at nagsasakay ng pasahero',
    			'Nakatigil ng matagal at nagbababa ng pasahero',
    			'nakatigil ng matagal at patay ang makina'
    			),
    		array(
    			'Sa nakatakdang paradahan',
    			'Sa lugar na tawiran ng tao',
    			'Sa isang patunguhang lugar'
    			),
    		array(
    			'Huminto at hintayin ang berdeng ilaw',
    			'Magpatuloy ang takbo',
    			'Magpatakbo ng marahan at magpatuloy kung ligtas'
    			),
    		array(
    			'Pribilehiyo',
    			'Karapatan',
    			'Karangalan'
    			),
    		array(
    			'Bawal lumusot kailanman',
    			'Maaaring lumusot ng pakanan',
    			'Maaaring lumusot ng pakaliwa'
    			),
    		);

    	for($ctr = 0; $ctr < count($arrQ) ;$ctr++){
                DB::table('questions')->insert([
                    'question' => $arrQ[$ctr],
                    'severity' => 0
                ]);
        }

    	for($ctr = 0; $ctr < count($arrQ) ;$ctr++){
            for($ctr1 = 0; $ctr1 < count($arrC[$ctr]); $ctr1++){
                DB::table('choices')->insert([
                    'question_id' => $ctr+1,
                    'choice' => $arrC[$ctr][$ctr1],
                    'is_correct' => 0
                ]);
            }
        }
    }
}
