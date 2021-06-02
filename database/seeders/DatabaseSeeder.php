<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Tom Lynch',
            'email' => 'tom@lnch.co.uk',
            'email_verified_at' => now(),
            'password' => Hash::make('Lnch2421!'),
        ]);

         Link::factory(10)->create();
    }
}
