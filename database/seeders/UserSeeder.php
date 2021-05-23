<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('role', 'admin')->count() == 0) {
            $user = User::create([
                'name' => 'Shehran Ahmad',
                'email' => 'admin@job.com',
                'email_verified_at' => '2020-08-07 17:00:00',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
                'avatar' => 'default.png',
                'slug'  =>'shehran-ahmad-842021123443'
            ]);
        }
    }
}
