<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                "name" => "tamm",
                "email" => "tamm@abc.com",
                "password" => bcrypt("123456"),
                "tel" => "0650555582",
                "address" => "TSU",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" => "ekill",
                "email" => "ekill@abc.com",
                "password" => bcrypt("123456"),
                "tel" => "06505777782",
                "address" => "TSU",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
        ]);
    }
}
