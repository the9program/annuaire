<?php

namespace App\Repository\Personal;


use App\Token;

class TokenRepository
{
    public function create(string  $email)
    {
        return Token::create([
            'token'         => sha1(md5(rand())),
            'category_id'   => 2,
            'email'         => $email,
            'creator_id'    => auth()->id()
        ]);
    }
}