<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
           'website_name'=>["ar"=>"Feleceazzuraa Arabic","he"=>"Feleceazzuraa"],
            'website_bio'=>["ar"=>"شركة متحصصة في البيع منتجاتFeleceazzuraa  ","he"=>"Compony "],
           'address'=>["ar"=>"فلسطين عزة","he"=>"Gaza Palstine"],
           'website_icon'=>'vJ267q7KUaFp2HRqaGMceOn5HETZQoYqpWzt7BXH.jpg',
           'website_wide_logo'=>'q9BzwTBK6nhp3eppO5are4abfpiqptlEPqhWvwIC.jpg',
           'website_logo'=>'KdEcYZ08BNVMf58xxzsIEJLExRVmpa4cdNnmb2qS.png',
           'contact_email'=>'sw@gdee.com'
        ]);
    }
}
