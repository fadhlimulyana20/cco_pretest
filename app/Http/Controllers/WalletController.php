<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function index(): View
    {
        // Should be using real session
        $mock_user_id = 1;

        // Get User Wallet Data
        $w = Wallet::where('user_id', $mock_user_id)->first();

        return view('wallet.index', [
            'wallet' => $w
        ]);
    }
}
