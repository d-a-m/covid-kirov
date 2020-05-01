<?php

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
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin',
            'email_verified_at' => Carbon/Carbon::now(),
            'password' => bcrypt('12345'),
            'is_admin' => true,
        ]);
    }
}
