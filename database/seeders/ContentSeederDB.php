<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeederDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create([
                'title' => ["ar" => "كاتبة المحتوى ", "he" => "שרך כחול "],
                'sub_title' => ["ar" => "كاتبةعنوان فرعي المحتوى ", "he" => "שרך כחול"],
                'url' => 'https://www.felceazzurrabio.it/en',
                'image' => 'Zko2tdDzkazdIxKNsuPX6xkOIHv8tI4SDrZPAEDI.jpg',

            ]


        );
    }
}
