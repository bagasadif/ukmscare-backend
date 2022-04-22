<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UkmRegistDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ukm_regist_descriptions')->insert([
            ['ukm_id' => 1],
            ['ukm_id' => 2],
            ['ukm_id' => 3],
            ['ukm_id' => 4],
            ['ukm_id' => 5],
            ['ukm_id' => 6]
        ]);
    }
}
