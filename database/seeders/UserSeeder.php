<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // SEED FROM ARRAY

        $model = new User();

        $items = [
            [
                'hex' => Str::random(11),
                'first_name' => 'Frank',
                'last_name' => 'Jones',
                'email' => 'frankjones.web@gmail.com',
                'email_verified_at' => time(),
                'password' => bcrypt('asasasas'),
                'user_type_id' => 4,
                'image' => null,
                'remember_token' => Str::random(10),
                'created_at' => time(),
                'updated_at' => time()
            ]
        ];

        foreach($items as $item){
            $model::create($item);
        }
    }
}
