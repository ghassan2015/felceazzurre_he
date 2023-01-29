<?php

namespace Database\Seeders;

use App\Models\Constant;
use Illuminate\Database\Seeder;

class ConstantsSeederDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array=[
          [
              'parent_id'=>null,
              's_key'=>'status_cd',
              'name'=>["ar"=>"حالة ","he"=>"סטָטוּס"]

          ],
            [
                'parent_id'=>1,
                's_key'=>'status_cd',
                'name'=>["ar"=>" فعال ","he"=>" פָּעִיל"]

            ],


            [
                'parent_id'=>1,
                's_key'=>'status_cd',
                'name'=>["ar"=>"غير فعال ","he"=>"לא פעיל"]

            ],



            [
                'parent_id'=>null,
                's_key'=>'story_cd',
                'name'=>["ar"=>"الاسم ","he"=>"שֵׁם"]

            ],



            [
                'parent_id'=>4,
                's_key'=>'story_cd',
                'name'=>["ar"=>"قصة ايطالية","he"=>"סיפור איטלקי"]

            ],

            [
                'parent_id'=>4,
                's_key'=>'story_cd',
                'name'=>["ar"=>"ذكريات","he"=>"זיכרונות"]

            ],

            [
                'parent_id'=>4,
                's_key'=>'story_cd',
                'name'=>["ar"=>"لفتة من الرعاية","he"=>"מחווה של טיפול"]

            ],


            [
                'parent_id'=>4,
                's_key'=>'story_cd',
                'name'=>["ar"=>"الجودة والابتكار","he"=>"איכות וחדשנות"]

            ],




        ];


        foreach ($array as$value){
            Constant::create([
                'parent_id'=>$value['parent_id'],
                's_key'=>$value['s_key'],
                'name'=>$value['name'],
            ]);
        }
    }
}
