<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\TravelPackage;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details', 'travel_package', 'user']) -> findOrFail($id);

        return view('pages.checkout', [
            'item' => $item
        ]);
    }

    public function proses(Request $request, $id)
    {
        $travel_package = TravelPackage::findOrFail($id);

        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'user_id' => Auth::user() -> id,
            'additional_visa' => 0,
            'transactions_total' => $travel_package -> price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction -> id,
            'username' => Auth::user() -> username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now() -> addYears(5)
        ]);

        return redirect() -> route('checkout', $transaction -> id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details', 'travel_package']) -> findOrFail($item -> transaction_id);

        if($request -> is_visa)
        {
            $transaction -> transactions_total -= 190;
            $transaction -> additional_visa -= 190;
        }

        $transaction -> transactions_total -= $transaction -> travel_packages -> price;

        $transaction -> save();
        $item -> delete();

        return redirect() -> route('checkout', $item->transaction_id);
    }

    public function create(Request $request, $id)
    {
        $request -> validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required'
        ]);

        $data = $request -> all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package']) -> find($id);

        if($request -> is_visa)
        {
            $transaction -> transactions_total += 190;
            $transaction -> additional_visa += 190;
        }

        $transaction -> transactions_total += $transaction -> travel_package -> price;

        $transaction -> save();

        return redirect()-> route('checkout', $id);
    }

    public function success(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction -> transaction_status ='PENDING';

        $transaction -> save();

        return view('pages.success');
    }
}
