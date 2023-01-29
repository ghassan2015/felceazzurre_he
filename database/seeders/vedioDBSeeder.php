<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class vedioDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::create([
        'title'=>["ar"=>"فيديو","he"=>"וִידֵאוֹ"],
         'image'=>'tUjlXhgW9bvXps9MqjGHlTF4sI5WgAYqGeG1r7Fn.jpg',
        'video'=>'2s6pIQ2v8UVqcBin6s4TkAKoaEGDfhlMoECOABgx.mp4',

        ]);
    }
}
