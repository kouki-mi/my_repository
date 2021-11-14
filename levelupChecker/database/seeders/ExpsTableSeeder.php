<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exps')->insert([
            'u_id' => 1,
            'growth_id' => 1,
            'title' => "expの表示を作成",
            'content' => "growth内のexpを表示する処理を作成した",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
