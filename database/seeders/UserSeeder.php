<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $model = new User();

        $items = [
            [
               'id' => 1,
               'hex' => '5yyH9cLi3Nk',
               'first_name' => 'Frank',
               'last_name' => 'Jones',
               'email' => 'frankjones.web@gmail.com',
               'password' => '$2y$10$sY4WAeKAnCvjmM7/Xrkogum66wWqNXdZBjLOfvcXqu5eMi388SwSO',
               'created_at' => '2023-05-13 16:34:40',
               'updated_at' => '2023-05-14 16:34:40'

            ]
        ];

        foreach($items as $item){
            $model::create($item);
        }

    }
}
