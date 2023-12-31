<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $model = new City();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){

            $model::on('mysql')->create([
                'id' => $item->id,
                'hex' => $item->hex,
                'state_id' => $item->state_id,      
                'name' => $item->name,      
                'slug' => $item->slug
            ]);

        }

    }

}
