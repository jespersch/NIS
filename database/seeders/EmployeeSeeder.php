<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = storage_path('app/public/csv/NaikieDas - Personeel.csv');
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
                        'firstname' => $rowData['Voornaam'],
                        'infix' => $rowData['Tussenvoegsels'],
                        'surname' => $rowData['Achternaam'],
                        'gender' => $rowData['Geslacht'],
                        'department' => $rowData['Afdeling'],
                        'function' => $rowData['Functie'],
                        'username' => $rowData['Gebruikersnaam'],
                        'password' => Hash::make($rowData['Wachtwoord']),
                        'employeenumber' => $rowData['Personeelsnummer'],

                    ];



                    Employee::create($data);
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
