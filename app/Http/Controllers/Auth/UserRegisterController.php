<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRegisterController extends Controller
{
    private $users;

    /**
     * UserRegisterController constructor.
     * @param UserRepository $users
     */

    public function __construct(UserRepository $users)
    {
        $this->middleware('guest');
        $this->users = $users;
    }

    public function showRegisterForm()
    {
        // dd("registerForm user");
        return view('auth.user-register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->all() + [
            'role' => 'user',
            'status' => 'active'
        ];

        $user = $this->users->create($data);
        toastr()->success('Registration successful!');
        toastr()->error("Votre compte n'est pas activé");
        Auth::login($user);
        return redirect()->intended(RouteServiceProvider::USER);
        // return redirect()->route('login');
    }
}
