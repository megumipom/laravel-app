<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $params[] =
        [
            'name' => 'nekochi2',
            'mail' => 'tama@tm.jp',
            'age' => 5,
        ];
        $params[] =
        [
            'name' => 'inui2',
            'mail' => 'inui@tm.jp',
            'age' => 20,
        ];
        $params[] =
        [
            'name' => 'torii2',
            'mail' => 'torii@tm.jp',
            'age' => 13,
        ];
        foreach($params as $param){
        DB::table('animal')->insert($param);
        }
    }
}
