<?php

namespace Database\Seeders;

use App\Models\Labrosan;
use Illuminate\Database\Seeder;

class LabrosanSeederDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Labrosan::create([
           'title'=>["ar"=>"الترطيب والحماية","he"=>"לחות והגנה"],
            'sub_title'=>["ar"=>"يوما بعد يوم بفضل المكونات الطبيعية","he"=>"הכל הופך למשחק!"],
            'description'=>["ar"=>"<p>لابروسان هو الخط الكامل المكرس لحماية شفتيك:واقية, أركان, الغرور الوردي, الألوة فيرا, مهدئ, الدفاع.<\/p>","he"=>"<p>Labrosan is the complete line dedicated to protecting your lips: Protective, Argan, Vanity Pink, Aloe Vera, Soothing, Defense.<\/p>"]
        ]);
    }
}
