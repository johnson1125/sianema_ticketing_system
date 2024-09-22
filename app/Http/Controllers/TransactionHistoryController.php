<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionHistoryController extends Controller
{
    public function fetchTransactionHistory()
    {
        return view('userManagement.transactionHistory'); // Pass movies to the view
    }
}
