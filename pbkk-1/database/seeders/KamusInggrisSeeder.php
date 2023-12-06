<?php

namespace Database\Seeders;

use App\Models\PaketSoal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KamusInggrisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row = 1;
        if (($handle = fopen(storage_path('seeding/Dictionary.csv'), "r")) !== FALSE) {

            DB::table('users')->insert(
                [
    
                        'name' => "DEBUG",
                        'email' => "debug@example.com",
                        'password' => Hash::make("DEBUG"),
       
            ]
            );

            DB::table('bahasas')->insert(
                [
    
                        'bahasa' => "debugBahasa"
       
            ]
            );

            while (($row < 150000 && $data = fgetcsv($handle, 1500, ",")) !== FALSE) {
                if($row % 500 > 0){
                    $row++;
                    continue;
                }
                else{
                DB::table('kamus_bahasas')->insert(
                    [
        
                            'last_editor' => 1,
                            'bahasa' => 1,
                            'kata' => $data[0],
                            'pengertian' => $data[2],
                            'contoh' => "PLACEHOLDER",
           
                    ]
                    );
                    $row++;
                }
            }
            fclose($handle);

            PaketSoal::factory()->count(5)->create();
        }



    }
    
}
