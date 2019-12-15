<?php

use App\Category;
use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(
            [
                'name' => 'Ayam'
            ]
        );
        Category::create(
            [
                'name' => 'Pakan'
            ]
        );
        Category::create(
            [
                'name' => 'Obat'
            ]
        );

        Product::create(
            [
                'name' => 'Ayam',
                'category_id' => 1,
                'unit' => 'Pcs'
            ]
        );
        Product::create(
            [
                'name' => 'A10',
                'category_id' => 2,
                'unit' => 'Sacks'
            ]
        );
        Product::create(
            [
                'name' => 'A15',
                'category_id' => 2,
                'unit' => 'Sacks'
            ]
        );

        Product::create(
            [
                'name' => 'Paramex',
                'category_id' => 3,
                'unit' => 'Kg'
            ]
        );
    }
}
