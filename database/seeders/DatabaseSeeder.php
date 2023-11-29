<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publication;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        Publication::create([
            'title' => 'Riot usuwa Yumi!',
            'content' => 'Lorem ipsum dolor sit amet...',
            'author_id' => $testUser->id, 
        ]);
        
    }
}
