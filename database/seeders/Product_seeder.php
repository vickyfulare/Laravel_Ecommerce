<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Product_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         //
        DB::table('products')->insert([
            'name'=>'Apple Laptop',
            'price'=>'45000',
            'category'=>'Lpatop',
            'description'=>'This is a good and fast HP laptop.',
            'gallery'=>'https://unsplash.com/photos/silver-macbook-on-white-table-Hin-rzhOdWs',
        ]);
    }
}
