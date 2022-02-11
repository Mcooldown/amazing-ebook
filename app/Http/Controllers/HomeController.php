<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('viewIndex', 'viewResponse');
        $this->middleware('guest')->only('viewIndex');
    }

    public function viewIndex($locale = 'en')
    {
        App::setLocale($locale == 'id' ? 'id' : 'en');
        return view('pages.index', [
            'locale' => $locale
        ]);
    }

    public function viewResponse($locale = 'en')
    {

        App::setLocale($locale == 'id' ? 'id' : 'en');
        return view('pages.response', [
            'locale' => $locale
        ]);
    }

    public function viewHome($locale = 'en')
    {
        App::setLocale($locale == 'id' ? 'id' : 'en');
        return view('pages.home', [
            'ebooks' => Ebook::all(),
            'locale' => $locale,
        ]);
    }
}
