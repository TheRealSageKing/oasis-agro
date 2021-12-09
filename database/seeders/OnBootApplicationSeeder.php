<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class OnBootApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = config('app_config.roles');

        if ($roles != null) {
            foreach ($roles as $role) {
                Role::firstOrCreate(['name' => $role]);
            }
        }

        $user = User::firstOrCreate([
            'first_name' => 'Site',
            'last_name' => 'administrator',
            'email' => 'site@admin.com',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('Administrator');

        $user = User::firstOrCreate([
            'first_name' => 'Super',
            'last_name' => 'administrator',
            'email' => 'super@admin.com',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('Super Administrator');

    }
}
