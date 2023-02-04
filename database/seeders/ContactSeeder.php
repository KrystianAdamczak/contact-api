<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Contact;
use Faker\Generator as Faker;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 1000; $i++) {
            \App\Models\Contact::create([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'phone' => $faker->e164PhoneNumber,
                'email' => $faker->email,
            ]);
        }
    }
}
