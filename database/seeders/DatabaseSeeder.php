<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Promise\Create;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


    //     User::create([
    //         'name' => 'shinji',
    //         'username' => 'shinji',
    //         'email' => 'shinji@gmail.com',
    //         'password' => bcrypt('shinji')
    //     ]);

    //     // User::create([
    //     //     'name' => 'Kenshin',
    //     //     'email' => 'kenshin@gmail.com',
    //     //     'password' => bcrypt('kenshin123')
    //     // ]);

    // User::factory(3)->create();
    

    //Category::factory(6)->create();
        Category::create([
            'name' => 'Space',
            'slug' => 'space'
        ]);

        Category::create([
            'name' => 'Anime',
            'slug' => 'anime'
        ]);

        Category::create([
            'name' => 'Water',
            'slug' => 'water'
        ]);

        Category::create([
            'name' => 'Nature',
            'slug' => 'nature'
        ]);
    Post::factory(5)->create();
    
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
