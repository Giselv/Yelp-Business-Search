<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Business;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Business::truncate();
  
        $csvFile = fopen(base_path("database/data/yelp_file_2.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                //business_id,name,address,city,state,postal_code,latitude,longitude,stars,review_count,is_open,categories
                Business::create([
                    "business_id" => $data['0'],
                    "name" => $data['1'],
                    "address"=>$data['2'],
                    "city"  => $data['3'],
                    "state" => $data['4'],
                    "postal_code"=>$data['5'],
                    "stars"=>$data['8'],
                    "review_count"=>$data['9'],
                    "is_open"=>$data['10'],
                    "categories"=>$data['11']
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    
    }
}
