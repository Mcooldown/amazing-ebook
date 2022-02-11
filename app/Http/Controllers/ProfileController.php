<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewProfile($locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        return view('pages.profile', [
            'account' => Auth::user(),
            'genders' => Gender::all(),
            'locale' => $locale
        ]);
    }

    public function updateProfile(Request $request, $locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        $request->validate([
            'first_name' => 'required|alpha_num|max:25',
            'middle_name' => 'nullable|alpha_num|max:25',
            'last_name' => 'required|alpha_num|max:25',
            'gender' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => ['required', Password::min(8)->numbers()],
            'display_picture' => 'nullable|image'
        ]);

        $existEmail = Account::where('account_id', '!=', Auth::id())
            ->where('email', $request->email)->first();
        if ($existEmail) {
            return back()->withInput($request->input())->withErrors('email', 'Email already taken');
        }

        $account = Account::find(Auth::id());

        if ($request->hasFile('display_picture')) {
            $extension = $request->file('display_picture')->getClientOriginalExtension();
            $fileName = $request->input('first_name') . '-' . $request->input('last_name') . '-' . time() . '.' . $extension;
            $request->file('display_picture')->storeAs('public/display-pictures', $fileName);
        } else {
            $fileName = $account->display_picture_link;
        }

        $account->first_name = $request->input('first_name');
        $account->middle_name = $request->input('middle_name');
        $account->last_name = $request->input('last_name');
        $account->gender_id = $request->input('gender');
        $account->email = $request->input('email');
        $account->display_picture_link = $fileName;
        if ($request->input('password') != $account->password) {
            $account->password = Hash::make($request->input('password'));
        }
        $account->modified_by = $account->first_name . ' ' . $account->middle_name . ' ' . $account->last_name;
        $account->modified_at = now();
        $account->save();

        if ($locale == 'id') {
            $message = 'Tersimpan!';
            $messageLink = "Klik disini untuk ke 'Beranda'";
        } else {
            $message = 'Saved!';
            $messageLink = "Click here to 'Home'";
        }

        return redirect()->route('view-response', $locale)
            ->with('message', $message)
            ->with('route', 'view-home')
            ->with('messageLink', $messageLink);
    }
}
