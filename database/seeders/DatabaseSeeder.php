<?php

namespace Database\Seeders;

use App\Models\MaterialsStock;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(MaterialSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(MaterialsStockSeeder::class);
        $this->call(SupplierSeeder::class);
    }
}
