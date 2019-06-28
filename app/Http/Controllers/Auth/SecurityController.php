<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Personal\Security\EmailRequest;
use App\Http\Requests\Personal\Security\PasswordRequest;
use App\Http\Controllers\Controller;
use App\Repository\Personal\UserRepository;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{

    /**
     * Form Security for update
     * Address email
     * Or password
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function security()
    {
        //dd(session('locale'));
        return view('auth.security');
    }

    /**
     * Update only if email change
     * Start process verified email
     *
     * @param EmailRequest $request
     * @param UserRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     */

    public function email(EmailRequest $request,UserRepository $repository)
    {
        if(auth()->user()->email != $request->email)
        {

            if($repository->updateMyEmail($request->email)){

                session()->flash('success', 'Votre Addresse email a bien été Modifier');

                return redirect()->route('home');

            }


            session()->flash('warning', 'Une Erreur s\'est produit l\'or de la modification de votre 
            address mail veuillez ressayer à nouveau');

        }

        return back();

    }

    /**
     * Update only new and true Current password
     *
     * @param PasswordRequest $request
     * @param UserRepository $repository
     * @return mixed
     */

    public function password(PasswordRequest $request,UserRepository $repository)
    {

        if (Hash::check($request->current_password, auth()->user()->password)) {

            if (!Hash::check($request->password, auth()->user()->password)) {

                if($repository->changeMyPassword($request->password)) {

                    session()->flash('success', 'Votre mot de passe a bien été Modifier');

                    return  redirect()->route('home');

                }

                session()->flash('warning', 'Une Erreur s\'est produit l\'or de la modification de votre 
                        address mot de passe veuillez ressayer à nouveau');

                return  back();

            }


            return  back()->withErrors([
                'password' => 'Vous avez indiqué le même mot de passe!'
            ])
                ->withInput();

        }

        return back()
            ->withErrors([
                'current_password' => 'Votre mot de passe Actuel est incorrect'
            ])
            ->withInput();

    }
}
