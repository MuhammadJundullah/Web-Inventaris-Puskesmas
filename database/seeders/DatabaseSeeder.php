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
            'username' => 'bendahara',
            'password' => Hash::make('bendahara'),
            'role' => 'bendahara'
        ]);

        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            Inventory::create([
                'nama_barang' => 'nama barang',
                'sumber_dana' => 'APBN',
                'merek' => 'Merk barang',
                'jumlah' => $faker->numberBetween(1, 100),
                'kondisi' => 'kondisi barang',
                'tempat_barang' => 'TU',
                'editor' => 'admin',
                'tanggal' => $faker->dateTimeBetween('2000-01-01', '2025-12-31')->format('Y-m-d'),
                'gambar' => 'gambar.jpg',
            ]);

            $faker = Faker::create();

            foreach (range(1, 100) as $index) {
                Treasurers::create([
                    'nama_pegawai' => $faker->name(),
                    'id_pegawai' => $faker->numberBetween(100, 500),
                    'tanggal' => $faker->dateTimeBetween('2000-01-01', '2025-12-31')->format('d-m-Y'),
                    'kegiatan' => $faker->name(),
                    'dana_yang_digunakan' => $faker->numberBetween(10000, 999999),
                    'jumlah' => $faker->numberBetween(1, 100),
                ]);
            }
        }
    }
}
