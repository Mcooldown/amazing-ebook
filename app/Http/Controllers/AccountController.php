<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function viewAccountMaintenance($locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        return view('pages.account-maintenance', [
            'accounts' => Account::all(),
            'locale' => $locale
        ]);
    }

    public function viewAccountRoleDetails($id, $locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        $account = Account::find($id);

        if ($account) {
            return view('pages.account-role-details', [
                'account' => $account,
                'roles' => Role::all(),
                'locale' => $locale
            ]);
        } else abort(404);
    }

    public function updateRole(Request $request, $id, $locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        $request->validate([
            'role' => 'required',
        ]);

        $account = Account::find($id);
        $editor = Account::find(Auth::id());

        if ($account) {
            $account->update([
                'role_id' => $request->input('role'),
                'modified_by' => $editor->first_name . ' ' . $editor->middle_name . ' ' . $editor->last_name,
                'modified_at' => now()
            ]);

            return redirect()->route('view-account-maintenance', $locale);
        } else abort(404);
    }

    public function deleteAccount($id, $locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        $account = Account::find($id);
        if ($account) {
            $account->delete();
            return redirect()->route('view-account-maintenance', $locale);
        } else abort(404);
    }
}
