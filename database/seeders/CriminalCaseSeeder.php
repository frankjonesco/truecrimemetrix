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
        $items = [
            [
                'hex' => 'p8GDrtsr5Ds',
                'title' => 'Dan Markel Case',
                'status' => 'public'

            ]
        ];


        foreach($items as $item){
            CriminalCase::create($item);
        }
    }
}
