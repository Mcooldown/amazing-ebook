<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Order;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function viewEbookDetails($id, $locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        $ebook = Ebook::find($id);

        if ($ebook) {
            return view('pages.ebook-details', [
                'ebook' => $ebook,
                'locale' => $locale,
            ]);
        } else abort(404);
    }

    public function addToCart($id, $locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        $ebook = Ebook::find($id);

        if (session()->exists('cart')) {
            $cart = session()->get('cart');
        } else {
            $cart = NULL;
        }
        if ($ebook) {
            if ($cart != NULL) {
                $exist = false;
                foreach ($cart as $item) {
                    if ($item->ebook_id == $ebook->ebook_id) {
                        $exist = true;
                        break;
                    }
                }
                if (!$exist) {
                    session()->push('cart', $ebook);
                }
            } else {
                session()->push('cart', $ebook);
            }
        }

        return redirect()->route('view-cart', $locale);
    }

    public function viewCart($locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        $cart = session()->get('cart');
        if ($cart == NULL) {
            $cart = [];
        }
        return view('pages.cart', [
            'cart' => $cart,
            'locale' => $locale
        ]);
    }

    public function deleteCartItem($id, $locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        $cart = session()->pull('cart');

        foreach ($cart as $index => $item) {
            if ($item->ebook_id == $id) {
                unset($cart[$index]);
                break;
            }
        }

        session()->put('cart', $cart);

        return back();
    }

    public function addToOrder($locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        $cart = session()->pull('cart');
        if ($cart != NULL) {
            foreach ($cart as $item) {
                Order::create([
                    'account_id' => Auth::id(),
                    'ebook_id' => $item->ebook_id,
                    'order_date' => now(),
                ]);
            }
            if ($locale == 'id') {
                $message = 'Sukses!';
                $messageLink = "Klik disini untuk ke 'Beranda'";
            } else {
                $message = 'Success!';
                $messageLink = 'Click here to "Home"';
            }

            return redirect()->route('view-response', $locale)
                ->with('message', $message)
                ->with('route', 'view-home')
                ->with('messageLink', $messageLink);
        } else abort(404);
    }

    public function viewOrder($locale = 'en')
    {
        App::setlocale($locale == 'id' ? 'id' : 'en');
        return view('pages.order', [
            'orders' => Order::where('account_id', Auth::id())->get(),
            'locale' => $locale
        ]);
    }
}
