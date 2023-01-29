<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminDBSeeder::class);
        $this->call(RoleDBSeeder::class);
        $this->call(ConstantsSeederDB::class);
        $this->call(ContentSeederDB::class);
        $this->call(LabrosanSeederDB::class);
        $this->call(vedioDBSeeder::class);
        $this->call(saponellosDBSeed::class);
        $this->call(SettingDBSeeder::class);
        $this->call(CategoryDBSeed::class);

//        $this->call(StoryDBSeed::class);

    }
}
