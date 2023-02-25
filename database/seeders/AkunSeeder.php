<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'nim' => '531422',
                'role' => 'admin',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'user',
                'nim' => '531421',
                'role' => 'user',
                'password' => bcrypt('user'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
