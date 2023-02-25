<?php

namespace Database\Seeders;

use App\Models\Alamat;
use Illuminate\Database\Seeder;

class AlamatSeeder extends Seeder
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
                'fakultas_univ' => 'Fakultas',
                'alamat' => 'jalan',
                'nomor_telepon' => '099877',
                'email' => 'ft@ung.ac.id',
            ],
        ];
        foreach ($user as $key => $value) {
            Alamat::create($value);
        }
    }
}
