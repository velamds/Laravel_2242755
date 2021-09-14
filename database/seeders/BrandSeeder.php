<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{

    public function run()
    {
        Brand::factory(10)->create();
    }
}
