<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_name'=>'coke',
                'product_type'=>1,
                'price'=>15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_name'=>'pepsi',
                'product_type'=>1,
                'price'=>15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_name'=>'lay',
                'product_type'=>2,
                'price'=>20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_name'=>'lamb',
                'product_type'=>3,
                'price'=>1500,
                'created_at' => Carbon::now(),
                'updateed_at' => Carbon::now(),
            ],
        ]);
    }
}
