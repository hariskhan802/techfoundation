<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \DB::table('batches')->insert([
            [
            'name' => 'Batch 1',
            'teacher_id' => 2,
            'start_time' => '13:00',
            'end_time' => '15:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]
            ]);
            \DB::table('devices')->insert([
                [
                'name' => 'Hp victus 15',
                'model' => 'victus',
                'brand' => 'hp',
                'created_at' => now(),
                'updated_at' => now(),
            ]
                ]);
        \DB::table('roles')->insert([
            [
            'name' => 'Super Admin',
            'abilities' => '[{"action": "manage","subject":"all"}]',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Teacher',
            'abilities' => '[{"action": "manage","subject":"students"},{"action": "manage","subject":"courses"},{"action": "manage","subject":"tasks"},{"action": "manage","subject":"results"},{"action": "read","subject":"attendances"}]',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Parent',
            'abilities' => '[{"action": "read","subject":"courses"},{"action": "read","subject":"tasks"},{"action": "read","subject":"results"},{"action": "read","subject":"attendances"}]',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Student',
            'abilities' => '[{"action": "read","subject":"courses"},{"action": "read","subject":"tasks"},{"action": "read","subject":"results"},{"action": "read","subject":"attendances"}]',
            'created_at' => now(),
            'updated_at' => now(),
        ]
    ]);
    
        \DB::table('users')->insert([
            [
            'name' => 'Muhammad Haris',
            'email' => 'haris.khan802@yahoo.com',
            'username' => 'haris123',
            'is_super_admin' => 1,
            'password' => bcrypt('123456'),
            'phone' => '03123456789',
            'dob' => '1997-08-31',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Syed Daniyal Ahmed',
            'email' => 'daniyal@abc.com',
            'username' => 'daniyal123',
            'is_super_admin' => 0,
            'password' => bcrypt('123456'),
            'phone' => '03234567890',
            'dob' => '1996-12-18',
            'created_at' => now(),
            'updated_at' => now(),
            
        ], [
            'name' => 'Muhammad Shahid',
            'email' => 'shahid@abc.com',
            'username' => 'shahid123',
            'is_super_admin' => 0,
            'password' => bcrypt('123456'),
            'phone' => '03456789012',
            'dob' => '1970-00-01',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        , [
            'name' => 'Muhammad Ali',
            'email' => 'ali@abc.com',
            'phone' => '',
            'username' => 'ali123',
            'is_super_admin' => 0,
            'password' => bcrypt('123456'),
            'phone' => '03345678901',
            'dob' => '2003-11-15',
            'created_at' => now(),
            'updated_at' => now(),
        ]
    ]);

        \DB::table('user_roles')->insert([
            [
            'role_id' => '1',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'role_id' => '2',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'role_id' => '3',
            'user_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'role_id' => '4',
            'user_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]
    ]);

    \DB::table('parents')->insert([
        [
        'user_id' => 3,
        'parent_type' => 'father',
        'created_at' => now(),
        'updated_at' => now(),
    ], 
    ]);

    \DB::table('teachers')->insert([
        [
        'user_id' => 2,
        'linkedin_url' => 'https://www.linkedin.com/in/syed-daniyal-ahmed-a8641812b/',
        'created_at' => now(),
        'updated_at' => now(),
    ], 
    ]);
    \DB::table('students')->insert([
        [
        'user_id' => 4,
        'parent_id' => 3,
        'device_id' => 1,
        'batch_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ], 
    ]);
    


    }
}
