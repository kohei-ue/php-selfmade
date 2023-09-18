<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Plan;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('plans')->insert
        Plan::create([
            ['date' => '日帰り'],
            ['date' => '１泊２日'],
            ['date' => '２泊３日'],
            ['date' => '３泊４日'],
            ['date' => '４泊５日'],
            ['date' => '６泊以上'],
            ['money' => '～５０００円'],
            ['money' => '５０００～１００００円'],
            ['money' => '１０００１～２００００円'],
            ['money' => '２０００１～３００００円'],
            ['money' => '３０００１～４００００円'],
            ['money' => '４０００１～５００００円'],
            ['money' => '５０００１～６００００円'],
            ['money' => '６０００１～７００００円'],
            ['money' => '７０００１～８００００円'],
            ['money' => '８０００１～９００００円'],
            ['money' => '９０００１～１０００００円'],
            ['money' => '１００００１円以上'],
            ['traffic' => '徒歩'],
            ['traffic' => '電車、鉄道メイン'],
            ['traffic' => 'バスメイン'],
            ['traffic' => '車(レンタカー)メイン'],
            ['traffic' => '徒歩メイン＋飛行機'],
            ['traffic' => '電車、鉄道メイン＋飛行機'],
            ['traffic' => 'バスメイン＋飛行機'],
            ['traffic' => '車(レンタカー)メイン＋飛行機'],
        ]);
    }
}
