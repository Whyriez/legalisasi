<?php

namespace Database\Seeders;

use App\Models\Harga;
use Illuminate\Database\Seeder;

class HargaSeeder extends Seeder
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
                'nama_berkas' => 'Ijazah',
                'harga_perlembar' => 5000,

            ],
            [
                'nama_berkas' => 'Khs',
                'harga_perlembar' => 6000,
            ],

        ];
        foreach ($user as $key => $value) {
            Harga::create($value);
        }
    }
}
