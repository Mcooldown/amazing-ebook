<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function viewSignUp($locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        return view('pages.signup', [
            'genders' => Gender::all(),
            'roles' => Role::all(),
            'locale' => $locale,
        ]);
    }

    public function viewLogin($locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        return view('pages.login', [
            'locale' => $locale
        ]);
    }

    public function signUp(Request $request, $locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        $request->validate([
            'first_name' => 'required|alpha_num|max:25',
            'middle_name' => 'nullable|alpha_num|max:25',
            'last_name' => 'required|alpha_num|max:25',
            'gender' => 'required',
            'email' => 'required|email:rfc,dns|unique:accounts',
            'role' => 'required',
            'password' => ['required', Password::min(8)->numbers()],
            'display_picture' => 'required|image'
        ]);

        if ($request->hasFile('display_picture')) {
            $extension = $request->file('display_picture')->getClientOriginalExtension();
            $fileName = $request->input('first_name') . '-' . $request->input('last_name') . '-' . time() . '.' . $extension;
            $request->file('display_picture')->storeAs('public/display-pictures', $fileName);
        } else {
            $fileName = NULL;
        }

        Account::create([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'gender_id' => $request->input('gender'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role'),
            'password' => Hash::make($request->input('password')),
            'display_picture_link' => $fileName,
        ]);

        return redirect()->route('view-login', $locale);
    }

    public function login(Request $request, $locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('view-home', $locale);
        } else {
            return back()
                ->withInput($request->input())
                ->withErrors(['email' => 'Invalid email or password']);
        }
    }

    public function logout($locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        session()->flush();
        Auth::logout();

        if ($locale == 'id') {
            $message = 'Keluar Sukses';
        } else {
            $message = 'Logout Success';
        }
        return redirect()->route('view-response', $locale)
            ->with('message', $message);
    }
}
