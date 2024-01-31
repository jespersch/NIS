<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = storage_path('csv/NaikieDas - Grondstoffen.csv');
        $open = fopen($csvFile, "r");

        if ($open !== false) {
            $headers = fgetcsv($open, 1000, ";");

            if ($headers !== false) {
                $headers = array_map(function ($value) {
                    return str_replace("\xEF\xBB\xBF", '', $value);
                }, $headers);

                while (($row = fgetcsv($open, 1000, ";")) !== false) {
                    $data = array_combine($headers, $row);
                    $data['status'] = $data['status'] ?? '1';
                    $data['stock'] = $data['stock'] ?? '0';
                    $data['cost'] = intval(str_replace(['€'], '', $data['cost']));
                    Material::create($data);
                }

                fclose($open);
                $this->command->info('MaterialSeeder completed successfully.');
            } else {
                fclose($open);
                $this->command->error('Invalid header row in CSV file.');
            }
        } else {
            $this->command->error('Unable to open CSV file.');
        }
    }
}
