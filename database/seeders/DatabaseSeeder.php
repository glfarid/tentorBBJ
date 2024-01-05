<?php

namespace Database\Seeders;

use App\Models\Aspek;
use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Aspek::create([
            'id' => 1,
            'keterangan' => 'administrasi',
            'kode_aspek' => 'A1',
            'persentase' => 30,
            'bobot_cf' => 60,
            'bobot_sf' => 40

        ]);

        Aspek::create([
            'id' => 2,
            'keterangan' => 'Pemahaman',
            'kode_aspek' => 'P1',
            'persentase' => 30,
            'bobot_cf' => 70,
            'bobot_sf' => 30

        ]);

        Aspek::create([
            'id' => 3,
            'keterangan' => 'Wawancara',
            'kode_aspek' => 'W1',
            'persentase' => 40,
            'bobot_cf' => 75,
            'bobot_sf' => 25

        ]);


        Kriteria::create([
            'id' => 1,
            'kode_kriteria' => 'A1',
            'aspek_id' => '1',
            'deskripsi' => 'pas foto',
            'nilai' => 3,
            'jenis' => 'secondary factor'

        ]);
        
        Kriteria::create([
            'id' => 2,
            'kode_kriteria' => 'P1',
            'aspek_id' => '2',
            'deskripsi' => 'pas foto',
            'nilai' => 3,
            'jenis' => 'secondary factor'

        ]);

        Kriteria::create([
            'id' => 3,
            'kode_kriteria' => 'W1',
            'aspek_id' => '3',
            'deskripsi' => 'pas foto',
            'nilai' => 3,
            'jenis' => 'secondary factor'

        ]);
    }
}
