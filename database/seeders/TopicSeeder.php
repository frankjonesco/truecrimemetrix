<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'hex' => 'p8GDrtsr5Ds',
                'criminal_case_id' => 1,
                'title' => 'Rivera & Garcia Pringles',
                'status' => 'public'

            ]
        ];


        foreach($items as $item){
            Topic::create($item);
        }
    }
}
