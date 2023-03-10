<?php

namespace Database\Seeders;

use App\Models\ProductStatus;
use App\Models\StatusProduct;
use Illuminate\Database\Seeder;

class ProductStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductStatus::create(['name'=>'ممتازة']);
        ProductStatus::create(['name'=>'جيدة جدا']);
        ProductStatus::create(['name'=>'جيدة']);
        ProductStatus::create(['name'=>'رديئة']);
        ProductStatus::create(['name'=>'رديئة جدا']);
        StatusProduct::create(['name'=>'ممتازة']);
        StatusProduct::create(['name'=>'جيدة جدا']);
        StatusProduct::create(['name'=>'جيدة']);
        StatusProduct::create(['name'=>'رديئة']);
        StatusProduct::create(['name'=>'رديئة جدا']);
    }
}
