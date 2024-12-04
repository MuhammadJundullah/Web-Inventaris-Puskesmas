<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

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
        }

    }
}
