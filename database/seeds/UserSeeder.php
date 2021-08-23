<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->full_name = 'admin';
        $user->email = 'admin@admin.com';
        $user->phone = '5655555';
        $user->role = config('constants.role')['admin'];
        $user->password = Hash::make('admin123admin');
        $user->save();

        $user = new User();
        $user->full_name = 'manager';
        $user->email = 'manager@manager.com';
        $user->phone = '5655555';
        $user->role = config('constants.role')['manager'];
        $user->password = Hash::make('manager123manager');
        $user->save();

        $user = new User();
        $user->full_name = 'user';
        $user->email = 'user@user.com';
        $user->phone = '5655555';
        $user->role = config('constants.role')['user'];
        $user->password = Hash::make('user123user');
        $user->save();
    }
}
