<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        #User::Factory()->create([
            #'name' => 'Test User',
            #'email'=> 'test@email.com',
        #]);

        $this->call([
            ProductSeeder::class
        ]);


    }





}
