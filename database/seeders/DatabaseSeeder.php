<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'dip',
            'email' => '1@1.1',
            'password' => bcrypt('1'),
            'is_admin' => true,
        ]);
        User::factory()->create([
            'name' => 'sakib',
            'email' => '2@2.2',
            'password' => bcrypt('2'),
            'is_admin' => false,
        ]);
        $this->call([
            TicketSeeder::class,
        ]);
    }
}
