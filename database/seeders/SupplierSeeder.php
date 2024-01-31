<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = storage_path('csv/NaikieDas - Leveranciers.csv');
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
                        'company' => $rowData['Bedrijfsnaam'],
                        'street' => $rowData['Straat'],
                        'housenumber' => $rowData['huisnummer'],
                        'addition' => $rowData['Toevoegsels'],
                        'postalcode' => $rowData['postcode'],
                        'country' => $rowData['land'],
                        'city' => $rowData['plaats'],
                        'contact' => $rowData['contactpersoon'],
                        'gender' => $rowData['geslacht'],
                        'phonenumber' => $rowData['telefoon'],
                        'mail' => $rowData['mail'],
                    ];



                    Supplier::create($data);
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
