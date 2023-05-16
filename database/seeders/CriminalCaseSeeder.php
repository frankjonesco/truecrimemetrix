<?php

namespace Database\Seeders;

use App\Models\CriminalCase;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CriminalCaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $model = new CriminalCase();
        
        $items = $model::on('mysql_import')->get()->toArray();
        foreach($items as $item){
            $model::create($item);
        }
    }
}
