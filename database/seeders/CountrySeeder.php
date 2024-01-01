<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $model = new Country();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){
            
            $model::on('mysql')->create([
                'id' => $item->id,      
                'name' => $item->name,      
                'slug' => $item->slug,
                'iso' => $item->iso
            ]);

        }
    }
}
