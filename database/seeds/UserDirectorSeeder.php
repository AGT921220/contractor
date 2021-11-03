<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserDirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name='Director';
        $user->lname='Director';
        $user->email='director@contractor.com';
        $user->user_type=User::DIRECTOR;
        $user->password = Hash::make('agt1234567');
        $user->save();
    }
}
