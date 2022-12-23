<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $transactions_count = Transaction::all()->count();
        $accounts_count = Account::all()->count();
        $transactions = Transaction::with(['account'])->get()->sortByDesc('created_at')->take(5);

        return view('index', compact(['transactions_count', 'accounts_count', 'transactions']));
    }
}
