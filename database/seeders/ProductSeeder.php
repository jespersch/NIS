<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = storage_path('csv/NaikieDas - Artikelen.csv');
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
                        'name' => $rowData['Naam'],
                        'price' => intval(str_replace(['€'], '', $rowData['Verkoopprijs'])),
                        'category' => $rowData['Categorie'],
                        'stock' => $rowData['Voorraad'] ?? '1',
                        'minstock' => $rowData['Minimale voorraad'] ?? '0',
                        'picture' => $rowData['Afbeelding'],
                    ];



                    Product::create($data);
                }

                fclose($open);
                $this->command->info('SupplierSeeder completed successfully.');
            } else {
                fclose($open);
                $this->command->error('Invalid header row in CSV file.');
            }
        } else {
            $this->command->error('Unable to open CSV file.');
        }
    }
}
