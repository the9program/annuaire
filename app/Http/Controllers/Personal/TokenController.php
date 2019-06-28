<?php

namespace App\Http\Controllers\Personal;

use App\Http\Requests\Personal\Security\EmailRequest;
use App\Http\Requests\Personal\Security\TokenRequest;
use App\Notifications\Personal\TokenNotification;
use App\Repository\Personal\TokenRepository;
use App\Repository\Personal\UserRepository;
use App\Token;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{

    public function index(Token $token)
    {

        if (auth()->user()->can('token', $token)) {

            return view('real.token.index', [
                'tokens' => Token::all()
            ]);

        }

        return abort(404);

    }

    public function create(Token $token)
    {

        if (auth()->user()->can('token', $token)) {

            return view('real.token.create');

        }

        return abort(404);
    }

    public function store(EmailRequest $request, TokenRepository $repository)
    {

        if (auth()->user()->can('token', $token)) {

            if ($request->email == auth()->user()->email) {

                return back()->withErrors(['email' => __('personal/token.self_error')])->withInput();

            }

            $token = $repository->create($request->email);

            $token->notify(new TokenNotification($token));

            session()->flash('success', __('personal/token.created'));

            return redirect()->route('token.index');

        }

        return abort(403);

    }

    public function edit(Token $token)
    {
        return view('real.token.edit', compact('token'));
    }

    public function update(TokenRequest $request, Token $token, UserRepository $repository)
    {

        $user = $repository->create($request->all(), true);

        Auth::guard()->login($user);

        $token->delete();

        return redirect()->route('home');
    }

    public function destroy(Token $token)
    {

        if (auth()->user()->can('token',$token)) {

            $token->delete();

            session()->flash('success', __('personal/token.deleted'));

            return redirect()->route('token.index');

        }

        return abort(403);

    }

}
