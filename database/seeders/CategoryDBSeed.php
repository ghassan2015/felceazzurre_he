<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryDBSeed extends Seeder
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
            'title'=>["ar"=>"عطري بشرتك","he"=>"מבשם את העור שלך"]
            ,"slug"=>["ar"=>"عطري-بشرتك","he"=>"מבשם-את-העור-שלך"],
                "image"=>"tAxoVjSvB068S1eU7YhMAsimFK17dL2MHgb6YX70.jpg",
                "icon_image_blue"=>"Y5sDLFgYo1fsvdK81OMgroH5COmoUunlbx5Ov13U.jpg",
                "icon_image_white"=>"NXsm0ZP0wBMzE3y0y4jJukW0oTJ3h9iLQKtxoOI8.jpg",


            ],


            [
                'title'=>["ar"=>"عطري غسيلك","en"=>"מבשם את הכביסה שלך"]
                ,"slug"=>["ar"=>"عطري-بشرتك","en"=>"מבשם-את-הכביסה-שלך"],
                "image"=>"SfSK63gGdsOrsu7e0viDlYoRg7tvBmzLW6GHeDDw.jpg",
                "icon_image_blue"=>"DNYtA3SAz6O8LhZPPdIzcetwdJg0c5jtnU0QBQFB.jpg",
                "icon_image_white"=>"WwyFKzFg03qFx0IXkCTIVDQrHbhzC0pCU0c82Giz.jpg",


            ],


            [
                'title'=>["ar"=>"عطري منزلك","en"=>"מבשם את הבית שלך"]
                ,"slug"=>["ar"=>"عطري-منزلك","en"=>"מבשם-את-ביתשלך"],
                "image"=>"45yx7VFIEddebG9CwZYUiXSE69BOcSL1T434GNvf.jpg",
                "icon_image_blue"=>"bgroCfKjGiDvxiNFLHyzQxpG9k7oxZPal7MPiMf6.jpg",
                "icon_image_white"=>"f0Lu5XpvmI6LYnwdBgpdFEJPTKQtzgqhu8ysPRM8.jpg",


            ],

        ];


        foreach ($array as$value){
            Category::create([
                'title'=>$value['title'],
                'slug'=>$value['slug'],
                'image'=>$value['image'],
                'icon_image_blue'=>$value['icon_image_blue'],
                'icon_image_white'=>$value['icon_image_white'],
            ]);
        }
    }
}
