<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ContainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('containers')->insert([
            [
                'nama_container' => '01',
                'type_container' => '35HC',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '02',
                'type_container' => '34HC',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '03',
                'type_container' => 'MVE',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '04',
                'type_container' => 'DR',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '05',
                'type_container' => '10XT',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '06',
                'type_container' => '35HC',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '07',
                'type_container' => '34HC',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '08',
                'type_container' => 'MVE',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '09',
                'type_container' => 'DR',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '10',
                'type_container' => '10XT',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '11',
                'type_container' => '35HC',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '12',
                'type_container' => '34HC',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '13',
                'type_container' => 'MVE',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '14',
                'type_container' => 'DR',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '15',
                'type_container' => '10XT',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '16',
                'type_container' => '35HC',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '17',
                'type_container' => '34HC',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '18',
                'type_container' => 'MVE',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '19',
                'type_container' => 'DR',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '20',
                'type_container' => '10XT',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '21',
                'type_container' => '35HC',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '22',
                'type_container' => '34HC',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '23',
                'type_container' => 'MVE',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '24',
                'type_container' => 'DR',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '25',
                'type_container' => '10XT',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '26',
                'type_container' => '35HC',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '27',
                'type_container' => '34HC',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '28',
                'type_container' => 'MVE',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '29',
                'type_container' => 'DR',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '30',
                'type_container' => '10XT',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '31',
                'type_container' => '35HC',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '32',
                'type_container' => '34HC',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '33',
                'type_container' => 'MVE',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '34',
                'type_container' => 'DR',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '35',
                'type_container' => '10XT',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '36',
                'type_container' => '35HC',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '37',
                'type_container' => '34HC',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '38',
                'type_container' => 'MVE',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '39',
                'type_container' => 'DR',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '40',
                'type_container' => '10XT',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '41',
                'type_container' => '35HC',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '42',
                'type_container' => '34HC',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '43',
                'type_container' => 'MVE',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '44',
                'type_container' => 'DR',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '45',
                'type_container' => '10XT',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '46',
                'type_container' => '35HC',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '47',
                'type_container' => '34HC',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '48',
                'type_container' => 'MVE',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '49',
                'type_container' => 'DR',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '50',
                'type_container' => '10XT',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '51',
                'type_container' => '35HC',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '52',
                'type_container' => '34HC',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '53',
                'type_container' => 'MVE',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '54',
                'type_container' => 'DR',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '55',
                'type_container' => '10XT',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '56',
                'type_container' => '35HC',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '57',
                'type_container' => '34HC',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '58',
                'type_container' => 'MVE',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '59',
                'type_container' => 'DR',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '60',
                'type_container' => '10XT',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '61',
                'type_container' => '35HC',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '62',
                'type_container' => '34HC',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '63',
                'type_container' => 'MVE',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '64',
                'type_container' => 'DR',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '65',
                'type_container' => '10XT',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '66',
                'type_container' => '35HC',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '67',
                'type_container' => '34HC',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '68',
                'type_container' => 'MVE',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '69',
                'type_container' => 'DR',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '70',
                'type_container' => '10XT',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '71',
                'type_container' => '35HC',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '72',
                'type_container' => '34HC',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '73',
                'type_container' => 'MVE',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '74',
                'type_container' => 'DR',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '75',
                'type_container' => '10XT',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '76',
                'type_container' => '35HC',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '77',
                'type_container' => '34HC',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '78',
                'type_container' => 'MVE',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '79',
                'type_container' => 'DR',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '80',
                'type_container' => '10XT',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '81',
                'type_container' => '35HC',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '82',
                'type_container' => '34HC',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '83',
                'type_container' => 'MVE',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '84',
                'type_container' => 'DR',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '85',
                'type_container' => '10XT',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '86',
                'type_container' => '35HC',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '87',
                'type_container' => '34HC',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '88',
                'type_container' => 'MVE',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '89',
                'type_container' => 'DR',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '90',
                'type_container' => '10XT',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '91',
                'type_container' => '35HC',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '92',
                'type_container' => '34HC',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '93',
                'type_container' => 'MVE',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '94',
                'type_container' => 'DR',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '95',
                'type_container' => '10XT',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '96',
                'type_container' => '35HC',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '97',
                'type_container' => '34HC',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '98',
                'type_container' => 'MVE',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '99',
                'type_container' => 'DR',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '100', 
                'type_container' => '10XT',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '101', 
                'type_container' => '35HC',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '102', 
                'type_container' => '34HC',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '103', 
                'type_container' => 'MVE',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '104', 
                'type_container' => 'DR',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '105', 
                'type_container' => '10XT',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '106', 
                'type_container' => '35HC',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '107', 
                'type_container' => '34HC',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '108', 
                'type_container' => 'MVE',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '109', 
                'type_container' => 'DR',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '110', 
                'type_container' => '10XT',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '111', 
                'type_container' => '35HC',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '112', 
                'type_container' => '34HC',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '113', 
                'type_container' => 'MVE',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '114', 
                'type_container' => 'DR',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '115', 
                'type_container' => '10XT',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '116', 
                'type_container' => '35HC',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '117', 
                'type_container' => '34HC',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '118', 
                'type_container' => 'MVE',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '119', 
                'type_container' => 'DR',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '120', 
                'type_container' => '10XT',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '121', 
                'type_container' => '35HC',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '122', 
                'type_container' => '34HC',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '123', 
                'type_container' => 'MVE',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '124', 
                'type_container' => 'DR',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '125', 
                'type_container' => '10XT',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '126', 
                'type_container' => '35HC',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '127', 
                'type_container' => '34HC',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '128', 
                'type_container' => 'MVE',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '129', 
                'type_container' => 'DR',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '130', 
                'type_container' => '10XT',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '131', 
                'type_container' => '35HC',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '132', 
                'type_container' => '34HC',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '133', 
                'type_container' => 'MVE',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '134', 
                'type_container' => 'DR',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '135', 
                'type_container' => '10XT',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '136', 
                'type_container' => '35HC',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '137', 
                'type_container' => '34HC',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '138', 
                'type_container' => 'MVE',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '139', 
                'type_container' => 'DR',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '140', 
                'type_container' => '10XT',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '141', 
                'type_container' => '35HC',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '142', 
                'type_container' => '34HC',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '143', 
                'type_container' => 'MVE',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '144', 
                'type_container' => 'DR',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '145', 
                'type_container' => '10XT',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '146', 
                'type_container' => '35HC',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '147', 
                'type_container' => '34HC',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '148', 
                'type_container' => 'MVE',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '149', 
                'type_container' => 'DR',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '150', 
                'type_container' => '10XT',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '151', 
                'type_container' => '35HC',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '152', 
                'type_container' => '34HC',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '153', 
                'type_container' => 'MVE',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '154', 
                'type_container' => 'DR',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '155', 
                'type_container' => '10XT',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '156', 
                'type_container' => '35HC',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '157', 
                'type_container' => '34HC',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '158', 
                'type_container' => 'MVE',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '159', 
                'type_container' => 'DR',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '160', 
                'type_container' => '10XT',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '161', 
                'type_container' => '35HC',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '162', 
                'type_container' => '34HC',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '163', 
                'type_container' => 'MVE',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '164', 
                'type_container' => 'DR',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '165', 
                'type_container' => '10XT',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '166', 
                'type_container' => '35HC',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '167', 
                'type_container' => '34HC',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '168', 
                'type_container' => 'MVE',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '169', 
                'type_container' => 'DR',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '170', 
                'type_container' => '10XT',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '171', 
                'type_container' => '35HC',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '172', 
                'type_container' => '34HC',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '173', 
                'type_container' => 'MVE',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '174', 
                'type_container' => 'DR',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '175', 
                'type_container' => '10XT',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '176', 
                'type_container' => '35HC',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '177', 
                'type_container' => '34HC',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '178', 
                'type_container' => 'MVE',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '179', 
                'type_container' => 'DR',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '180', 
                'type_container' => '10XT',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '181', 
                'type_container' => '35HC',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '182', 
                'type_container' => '34HC',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '183', 
                'type_container' => 'MVE',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '184', 
                'type_container' => 'DR',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '185', 
                'type_container' => '10XT',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '186', 
                'type_container' => '35HC',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '187', 
                'type_container' => '34HC',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '188', 
                'type_container' => 'MVE',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '189', 
                'type_container' => 'DR',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '190', 
                'type_container' => '10XT',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '191', 
                'type_container' => '35HC',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '192', 
                'type_container' => '34HC',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '193', 
                'type_container' => 'MVE',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '194', 
                'type_container' => 'DR',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '195', 
                'type_container' => '10XT',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '196', 
                'type_container' => '35HC',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '197', 
                'type_container' => '34HC',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '198', 
                'type_container' => 'MVE',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '199', 
                'type_container' => 'DR',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '200', 
                'type_container' => '10XT',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '201', 
                'type_container' => '35HC',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '202', 
                'type_container' => '34HC',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '203', 
                'type_container' => 'MVE',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '204', 
                'type_container' => 'DR',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '205', 
                'type_container' => '10XT',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '206', 
                'type_container' => '35HC',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '207', 
                'type_container' => '34HC',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '208', 
                'type_container' => 'MVE',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '209', 
                'type_container' => 'DR',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '210', 
                'type_container' => '10XT',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '211', 
                'type_container' => '35HC',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '212', 
                'type_container' => '34HC',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '213', 
                'type_container' => 'MVE',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '214', 
                'type_container' => 'DR',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '215', 
                'type_container' => '10XT',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '216', 
                'type_container' => '35HC',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '217', 
                'type_container' => '34HC',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '218', 
                'type_container' => 'MVE',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '219', 
                'type_container' => 'DR',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '220', 
                'type_container' => '10XT',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '221', 
                'type_container' => '35HC',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '222', 
                'type_container' => '34HC',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '223', 
                'type_container' => 'MVE',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '224', 
                'type_container' => 'DR',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '225', 
                'type_container' => '10XT',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '226', 
                'type_container' => '35HC',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '227', 
                'type_container' => '34HC',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '228', 
                'type_container' => 'MVE',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '229', 
                'type_container' => 'DR',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '230', 
                'type_container' => '10XT',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '231', 
                'type_container' => '35HC',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '232', 
                'type_container' => '34HC',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '233', 
                'type_container' => 'MVE',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '234', 
                'type_container' => 'DR',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '235', 
                'type_container' => '10XT',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '236', 
                'type_container' => '35HC',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '237', 
                'type_container' => '34HC',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '238', 
                'type_container' => 'MVE',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '239', 
                'type_container' => 'DR',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '240', 
                'type_container' => '10XT',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '241', 
                'type_container' => '35HC',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '242', 
                'type_container' => '34HC',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '243', 
                'type_container' => 'MVE',	
                'code' => 'LIMOUSIN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '244', 
                'type_container' => 'DR',	
                'code' => 'BRAHMAN',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '245', 
                'type_container' => '10XT',	
                'code' => 'BALI',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '246', 
                'type_container' => '35HC',	
                'code' => 'FH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '247', 
                'type_container' => '34HC',	
                'code' => 'ACEH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '248', 
                'type_container' => 'MVE',	
                'code' => 'ONGOLE',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '249', 
                'type_container' => 'DR',	
                'code' => 'ANGUS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], [
                'nama_container' => '250', 
                'type_container' => '10XT',	
                'code' => 'MADURA',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
