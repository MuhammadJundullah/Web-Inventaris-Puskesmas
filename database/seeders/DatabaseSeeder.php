<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Inventory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Treasurers;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'inventaris'
        ]);

        User::create([
            'username' => 'admin1',
            'password' => Hash::make('admin1'),
            'role' => 'bendahara'
        ]);

        // $faker = Faker::create();

        // foreach (range(1, 100) as $index) {
        //     Inventory::create([
        //         'nama_barang' => 'nama barang',
        //         'sumber_dana' => 'APBN',
        //         'merek' => 'Merk barang',
        //         'jumlah' => $faker->numberBetween(1, 100),
        //         'kondisi' => 'kondisi barang',
        //         'tempat_barang' => 'TU',
        //         'editor' => 'admin',
        //         'tanggal' => $faker->dateTimeBetween('2000-01-01', '2025-12-31')->format('Y-m-d'),
        //         'gambar' => 'gambar.jpg',
        //     ]);

        //     $faker = Faker::create();

        //     $fixedNames = [
        //         'John Doe',
        //         'Jane Smith',
        //         'Alice Johnson',
        //         'Robert Brown',
        //         'Emily Davis',
        //         'Michael Wilson',
        //         'Sarah Miller',
        //         'David Taylor',
              
        //     ];

        //     foreach (range(1, 20) as $index) {
        //         Treasurers::create([
        //             'nama_pegawai' => $faker->randomElement($fixedNames), // Pilih dari daftar nama tetap
        //             'id_pegawai' => $faker->numberBetween(100, 500),
        //             'tanggal' => $faker->dateTimeBetween('2000-01-01', '2025-12-31')->format('Y-m-d'),
        //             'kegiatan' => $faker->word(), // Ubah menjadi kata acak untuk kegiatan
        //             'dana_yang_digunakan' => $faker->numberBetween(10000, 999999),
        //             'jumlah' => $faker->numberBetween(1, 100),
        //         ]);
        //     }
        // }
    }
}
