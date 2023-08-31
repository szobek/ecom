<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ticketSeed extends Seeder
{

    public function run()
    {
        DB::table('tickets')->insert([
            'name' => Str::random(10),
            'description' => Str::random(100),
            'deadline' => null,
            'success'=>0
        ]);
        DB::table('tickets')->insert([
            'name' => Str::random(10),
            'description' => Str::random(100),
            'deadline' => null,
            'success'=>0
        ]);
    }
}
