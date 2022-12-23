<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 20; $i++) {
            Account::create([
                'id' => $faker->regexify('[0-9]{16}'),
                'nama' => $faker->name,
                'jenis' => $faker->randomElement(['Personal', 'Bisnis']),
            ]);
        }
    }
}
