<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'login', 'authenticate']);
        $this->middleware('throttle:5,1')->only('authenticate');
        $this->middleware('auth')->only(['logout']);
    }

    /**
     * Where the folder view will be rendered
     */
    protected string $view = 'auth';

    /**
     * Show login form
     */
    public function login(): View
    {
        return view("$this->view.login");
    }

    /**
     * Authenticate user
     */
    public function authenticate(AuthenticateRequest $request)
    {
        if (Auth::attempt(['user' => $request->user, 'password' => $request->password], false)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect()->route('login');
    }
}
