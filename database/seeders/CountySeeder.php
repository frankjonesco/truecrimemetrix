<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    public function run(): void
    {
        $model = new County();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){
            
            $model::create([
                'id' => $item->id,
                'hex' => $item->hex,
                'state_id' => $item->state_id,      
                'name' => $item->name,      
                'slug' => $item->slug
            ]);

        }

    }

}
