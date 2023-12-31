<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        $model = new State();
        
        $items = $model::on('mysql_import')->get();

        foreach($items as $item){

            $model::on('mysql')->create([
                'id' => $item->id,
                'hex' => $item->hex,
                'code' => $item->code,      
                'name' => $item->name,      
                'slug' => $item->slug
            ]);

        }

    }

}
