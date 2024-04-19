<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Skill;
use App\Models\Project;
use App\Models\UserDetails;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create one user using the User factory
        $user = User::factory(1)->create();
        // Check if the user instance is not empty
        if ($user[0]) {
            // Create a new user details entry
            UserDetails::create([
                'address' => 'add info',
                'user_id' => $user[0]->id,
                'description'=>'test',
                'whatsapp_no'=>'9811111111',
                'phone_number'=>'9811111111',
                'fb_url'=>'https://www.facebook.com/',
                'insta_url'=>'https://www.instagram.com/',
                'linkedin_url'=>'https://www.linkedin.com/',
                'image'=>'logo1713502622.jpg',
            ]);
        }

        Skill::factory(10)->create();
        Project::factory(10)->create();
    }
}
