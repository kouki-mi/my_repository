<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrowthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $growths = [
            'title' => 'インターンシップ',
            'content' => 'システム開発について勉強をする'
        ];

        DB::table('growths')->insert([
            'u_id' => 1,
            'title' => $growths['title'],
            'content' => $growths['content'],
            'exp_point' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
