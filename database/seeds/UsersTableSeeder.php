<?php

use App\Phone;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'pdg@ly.ly',
            'password' => Hash::make("12345678"),
            'category_id' => 1
        ]);

        $real = $user->real()->create([
            'last_name'     => 'last_name',
            'first_name'    => 'first_name',
            'gender'        => 1,
            'birth'         => Carbon::parse('20-07-1987')->format('Y-m-d'),
        ]);

        $mobile = Phone::create([
            'phone'     => "0691039833"
        ]);

        $mobile->reals()->attach($real->id,['default' => true]);

    }
}
