<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\UsertableModal;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,200) as $index){
            UsertableModal::create([
                'name'=>$faker->name,
                'phone'=>$faker->phoneNumber,
                'email'=>$faker->email,

            ]);
           
        }
    }
}
