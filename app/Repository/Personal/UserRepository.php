<?php

namespace App\Repository\Personal;


use App\Http\Requests\Personal\Real\ParamsRequest;
use App\Phone;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository
{

    public function updateMyEmail(string $email)
    {

        return auth()->user()->update([
            'email' => $email, 'email_verified_at' => null
        ]);

    }

    public function changeMyPassword(string $password)
    {
        return auth()->user()->update([
            'password' => bcrypt($password)
        ]);
    }

    public function updateAvatar(UploadedFile $avatar)
    {

        if (auth()->user()->avatar) {

            Storage::disk('public')->delete(auth()->user()->avatar);

        }

        auth()->user()->update([

            'avatar' => $avatar->store('avatar')

        ]);
    }

    public function create(array  $data,$moderator = null)
    {
        $user =  User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'category' => (is_null($moderator)) ? null : 2
        ]);

        $real = $user->real()->create([
            'last_name'     => $data['last_name'],
            'first_name'    => $data['first_name'],
            'gender'        => $data['gender'],
            'birth'         => $data['birth'],
        ]);


        $mobile = Phone::create([
            'phone'     => $data['mobile']
        ]);

        $mobile->reals()->attach($real->id,['default' => true]);

        return $user;
    }
}