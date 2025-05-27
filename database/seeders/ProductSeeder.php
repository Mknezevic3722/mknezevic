<?php

namespace Database\Seeders;

use App\Models\Category;
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
        DB::table('categories')->insert([
            'id' => 1,
            'name' => "Jaja",
            'description' => "Jaja za jelo"
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => "Jaja2",
            'description' => "Jaja za jelo2"
        ]);
        $kat = new Category();
        $kat ->id = 3;
        $kat ->name = "Jaja3";
        $kat ->description = "Jaja za jelo";
        $kat ->save();

        DB::table('products')->insert([
            [
                'name' => "Kokosije",
                'description' => "Jaja za jelo12",
                'price' => 15.00,
                'category_id' => 1,
            ],
            [
                'name' => "Nojevo",
                'description' => "Jaja za jelo123",
                'price' => 55.00,
                'category_id' => 1,
            ],
             [
                'name' => "Morkino",
                'description' => "Jaja za jelo1234",
                'price' => 20.00,
                'category_id' => 1,
            ]


        ]);

    }
}
