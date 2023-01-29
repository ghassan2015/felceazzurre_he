<?php

namespace Database\Seeders;

use App\Models\Labrosan;
use App\Models\Saponello;
use Illuminate\Database\Seeder;

class saponellosDBSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Saponello::create([
            'title'=>["ar"=>"حماية وترطيب","en"=>"Moisturizing and protecting"],
            'sub_title'=>["ar"=>"يوما بعد يوم بفضل المكونات الطبيعية","he"=>"everything turns into a game!"],
            'description'=>["ar"=>"<p>لابروسان هو الخط الكامل المكرس لحماية شفتيك:واقية, أركان, الغرور الوردي, الألوة فيرا, مهدئ, الدفاع.<\/p>","he"=>"<p>Labrosan is the complete line dedicated to protecting your lips: Protective, Argan, Vanity Pink, Aloe Vera, Soothing, Defense.<\/p>"]
        ]);
    }
}
