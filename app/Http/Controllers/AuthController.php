<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
  public function register()
  {
    return view("auth/register");
  }

  public function registerSave(Request $request)
  {
    Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required',
    ])->validate();

    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => ($request->password),
    ]);

    return redirect()->route('login');
  }

  public function login()
  {
    return view('auth/login');
  }

  public function loginAction(Request $request)
  {
    Validator::make($request->all(), [
      'email' => 'required|email',
      'password' => 'required'
    ])->validate();

    if (!Auth::attempt($request->only('email', 'password'))) {
      throw ValidationException::withMessages([
        'email' => trans('auth.failed')
      ]);
    }

    $request->session()->regenerate();

    return redirect()->route('dashboard');
  }

  public function logout(Request $request)
  {
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    return redirect('/');
  }
}