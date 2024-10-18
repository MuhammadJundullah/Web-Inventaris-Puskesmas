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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'password' => 'user',
        //     'password' => 'test@example.com',
        // ]);
   
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ]);

        $faker = Faker::create();

        // Buat 50 entri data acak
        foreach (range(1, 10000) as $index) {
            Inventory::create([
                'nama_barang' => $faker->word(),
                'sumber_dana' => $faker->word(),
                'jumlah' => $faker->numberBetween(1, 100),
                'editor' => $faker->name(),
                'tanggal' => $faker->dateTimeBetween('2000-01-01', '2025-12-31')->format('Y-m-d'),
                'gambar' => $faker->word(),
            ]);
        }

    }
}
