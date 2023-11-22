<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamusInggrisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row = 1;
        if (($handle = fopen(storage_path('seeding/Dictionary.csv'), "r")) !== FALSE) {
            while (($row < 100 && $data = fgetcsv($handle, 1500, ",")) !== FALSE) {

                DB::table('kamus_bahasas')->insert(
                    [
        
                            'last_editor' => 0,
                            'bahasa' => 0,
                            'kata' => $data[0],
                            'pengertian' => $data[2],
                            'contoh' => "PLACEHOLDER",
           
                    ]
                    );
                    $row++;
                }
            fclose($handle);
        }

    }
    
}
