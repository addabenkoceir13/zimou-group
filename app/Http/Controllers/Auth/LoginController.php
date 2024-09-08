<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function submitLogin(LoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // dd( $data);

        if (auth()->attempt($data))
        {
            if (auth()->user()->role == 'admin')
            {
                return redirect()->intended(RouteServiceProvider::ADMIN);
            }
            elseif (auth()->user()->role == 'user')
            {
                if (auth()->user()->status == 'inactive')
                {
                    Auth::logout();
                    toastr()->error("Your account is not activated");
                    return redirect()->back();
                }
                elseif (auth()->user()->status == 'active')
                {
                    return redirect()->intended(RouteServiceProvider::USER);
                }
            }
        }
        else
        {
            toastr()->error("The email or password is incorrect");
            return redirect()->back();
        }
    }
}
