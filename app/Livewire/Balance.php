<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wallet;

class Balance extends Component
{
    public Wallet $wallet;
    public $amount = 0.0;
    public $depositAmount = 0;

    public function deposit()
    {
       $a = $this->amount + $this->depositAmount;
       $this->amount = $a;
       $this->wallet->makeDeposit($this->depositAmount);
       $this->depositAmount = 0;
    }

    public function withdrawal()
    {
       $a = $this->amount - $this->depositAmount;
       $this->amount = $a;
       $this->wallet->makeWithdrawal($this->depositAmount);
       $this->depositAmount = 0;
    }

    public function mount($wallet)
    {
        $this->amount = $wallet->amount;
        $this->wallet = $wallet;
    }

    public function render()
    {
        return view('livewire.balance');
    }
}
