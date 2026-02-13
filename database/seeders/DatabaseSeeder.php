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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //1. Create a pool of 10 Users
        $users = \App\Models\User::factory(20)->create();
        // 2. Create 30 Markets
        // recycle($users) randomly assigns one of the 10 users to each market's user_id
        $markets = \App\Models\Market::factory(30)
            ->recycle($users)
            ->create();

        // 3. Generate a mix of Review types for these markets
        $markets->each(function ($market) use ($users) {
            // Add 2 'Good' reviews (4-5 stars)
            \App\Models\Review::factory(25)
                ->good()
                ->recycle($users)
                ->recycle($market)
                ->create();
            //
            \App\Models\Review::factory(25)
                ->average()
                ->recycle($users)
                ->recycle($market)
                ->create();

            //
            \App\Models\Review::factory(25)
                ->bad()
                ->recycle($users)
                ->recycle($market)
                ->create();
        });
    }
}
