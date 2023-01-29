<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
           'name'=>'مدير النظام',
            'permissions'=>["roles","admins","categories","products","home","posts","stories","agent","sliders","Video","content","saponello","settings","Labrosan","banner"],
                'status'=>1
        ]);
        //
    }
}
