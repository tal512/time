<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $timestamp = date('Y-m-d H:i:s');
        $users = [
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => $timestamp,
            ],
        ];

        foreach ($users as $user) {
            $exists = User::where('email', $user['email'])->first();
            if (!$exists) {
                $newUser = new User();
                $newUser->name = $user['name'];
                $newUser->email = $user['email'];
                $newUser->password = $user['password'];
                $newUser->email_verified_at = $user['email_verified_at'];
                $newUser->save();
            }
        }
    }
}
