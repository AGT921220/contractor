<?php
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name ='Director';
        $user->email='director@contractor.com';
        $user->password =Hash::make('agt123');
        $user->fecha_nacimiento=Carbon::today()->subDays(rand(0, 10000));
        $user->save();
    }
}
