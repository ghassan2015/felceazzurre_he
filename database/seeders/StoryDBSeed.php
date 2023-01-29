<?php

namespace Database\Seeders;

use App\Http\Controllers\Admin\Story\StroryController;
use App\Models\Story;
use Illuminate\Database\Seeder;

class StoryDBSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'title' => ["ar" => "فيلس أزورا", "en" => "FELCE AZZURRA"],
                'description' => ["ar" => "تأسست شركة Paglieri في عام 1876 في Alessandria لإنتاج العطور وفي معملها تم تطوير خلطات عطرية خاصة Felce Azzurra (Blue Fern). تهدف هذه العلامة التجارية إلى استخدام العطور كطريقة للرفاهية ، بدءًا من العناية بالجسم إلى الغسيل والتنظيف المنزلي. سيغلف عالم من الروائح المعطرة جسمك ويعطر ملابسك. يجلب إتقان Felce Azzurra فن العطور القديم والعالي إلى كل إيماءة وطقوس من الحياة اليومية: تم تطوير جميع منتجات الخط بمعرفة عميقة بالجواهر وكيمياء من التوليفات القادرة على بث حياة جديدة في الذكريات والعواطف وتقديم الشعور بالرفاهية.",
                    "en" => "<p>Paglieri Company was founded in 1876 in Alessandria for the production of Perfumes and it was in its laboratory that Felce Azzurra (Blue Fern) special olfactive blends were developed. This brand aims at using perfume as a way to well-being, starting from body care to laundry and home cleaning. A world of scented notes will envelop your body and perfume your clothes. Felce Azzurra mastery brings the old and high perfumery art into each gesture and ritual of everyday life: all the products of the line are developed with a deep knowledge of essences and an alchemy of combinations able to breathe new life into memories and emotions and deliver a feeling of well-being.</p>"

                ], 'story_cd' => 5,
                'image' => 'QciWXfDSBJjANe48AYHOWnQWWvGjVu0xxMqQFPpj.png',


            ],


        ];

        foreach ($array as $arr){
            Story::create([
                'title'=>$arr['title'],
                'description'=>$arr['description'],
                'story_cd'=>$arr['story_cd'],
                'image'=>$arr['image']

            ]);
        }
    }
}
