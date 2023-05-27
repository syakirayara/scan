<?php

namespace Database\Seeders;

use App\Models\Tamu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tamu = [
            [
                'kode'       => '111',
                'nama'       => 'pt_aurora'
            ],
            [
                'kode'       => '222',
                'nama'       => 'pt_hijau'
            ]
        ];

        Tamu::insert($tamu);
    }
}
