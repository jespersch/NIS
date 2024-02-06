<?php

namespace Database\Seeders;

use App\Models\MaterialsStock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialsStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = storage_path('csv/NaikieDas - Voorraad Grondstoffen.csv');
        $open = fopen($csvFile, "r");

        if ($open !== false) {
            $headers = fgetcsv($open, 1000, ";");

            if ($headers !== false) {
                $headers = array_map(function ($value) {
                    return str_replace("\xEF\xBB\xBF", '', $value);
                }, $headers);

                while (($row = fgetcsv($open, 1000, ";")) !== false) {
                    $rowData = array_combine($headers, $row);
                    $data = [
                        'material' => $rowData['Stof'],
                        'stock' => $rowData['Voorraad'],
                        'minstock' => $rowData['Minimum Voorraad'],
                    ];



                    MaterialsStock::create($data);
                }

                fclose($open);
                $this->command->info('MaterialsStockSeeder completed successfully.');
            } else {
                fclose($open);
                $this->command->error('Invalid header row in CSV file.');
            }
        } else {
            $this->command->error('Unable to open CSV file.');
        }
    }
}
