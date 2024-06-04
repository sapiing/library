<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
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
    $user = User::orderBy('created_at', 'DESC')->get();
    $totalUser = User::count();
    return view("pages.user.index", compact('user', 'totalUser'));
  }

  public function create(Request $request) {
    $petugas = Petugas::all();
    return view('pages.user.create', compact('petugas'));
  }

  public function show(string $id) {
    $user = User::findOrFail($id);
    return view('pages.user.show', compact('user'));
  }

  public function registerSave(Request $request)
  {
    Validator::make($request->all(), [
      'email' => 'required|email',
      'password' => 'required',
      'id_petugas' => 'required',
    ])->validate();

    User::create([
      'id_petugas' => $request->id_petugas,
      'email' => $request->email,
      'password' => ($request->password),
    ]);

    return redirect()->route('user');
  }

  public function login()
  {
    return view('pages.user.index');
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
