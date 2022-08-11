<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Circle;
use App\Models\Location;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed Users
        User::factory(1)->create([
            'name' => 'Sumnima Limbu',
            'email' => 'sumnima@gmail.com',
            'phone_number' => '9804018923',
        ]);

        User::factory(1)->create([
            'name' => 'Sudip Limbu',
            'email' => 'sudip@gmail.com',
            'phone_number' => '9842533343',

        ]);


        User::factory(1)->create([
            'name' => 'Pushpa Limbu',
            'email' => 'pushpa@gmail.com',
            'phone_number' => '9816393322',
        ]);

        User::factory(10)->create();

        // Seed Circle
        Circle::insert([
            'user_id' => 1,
            'friend_id' => 3
        ]);

        Circle::insert([
            'user_id' => 1,
            'friend_id' => 4
        ]);

        // Seed Locations
        $locations = [
            ['latitude' => 27.658989, 'longitude' => 85.316906, 'time' => '08:01:01'],
            ['latitude' => 27.660452, 'longitude' => 85.317457, 'time' => '08:05:01'],
            ['latitude' => 27.661640, 'longitude' => 85.318433, 'time' => '08:25:01'],
            ['latitude' => 27.663167, 'longitude' => 85.319638, 'time' => '08:28:01'],
            ['latitude' => 27.665979, 'longitude' => 85.320797, 'time' => '08:35:01'],
            ['latitude' => 27.668190, 'longitude' => 85.321602, 'time' => '08:40:01'],
            ['latitude' => 27.670065, 'longitude' => 85.321534, 'time' => '09:00:01'],
            ['latitude' => 27.671478, 'longitude' => 85.318637, 'time' => '09:01:01'],
            ['latitude' => 27.672774, 'longitude' => 85.313802, 'time' => '09:05:01'],
            ['latitude' => 27.676916, 'longitude' => 85.316126, 'time' => '09:10:01'],
            ['latitude' => 27.681661, 'longitude' => 85.317686, 'time' => '09:15:01'],
            ['latitude' => 27.687039, 'longitude' => 85.317078, 'time' => '09:20:01'],
            ['latitude' => 27.692688, 'longitude' => 85.318494, 'time' => '09:22:01'],
            ['latitude' => 27.695348, 'longitude' => 85.320826, 'time' => '09:25:01'],
            ['latitude' => 27.699414, 'longitude' => 85.321856, 'time' => '09:29:01'],
            ['latitude' => 27.705645, 'longitude' => 85.322714, 'time' => '09:35:01'],
            ['latitude' => 27.709508, 'longitude' => 85.322099, 'time' => '09:40:01'],
            ['latitude' => 27.710243, 'longitude' => 85.324187, 'time' => '09:41:01'],
            ['latitude' => 27.710015, 'longitude' => 85.326076, 'time' => '09:50:01'],
            ['latitude' => 27.708913, 'longitude' => 85.324531, 'time' => '09:55:01'],
        ];

        foreach ($locations as $location) {
            Location::insert([
                'user_id' => 1,
                'latitude' => $location['latitude'],
                'longitude' => $location['longitude'],
                'created_at' => '2022-06-02 ' . $location['time'],
            ]);
        }
    }
}
