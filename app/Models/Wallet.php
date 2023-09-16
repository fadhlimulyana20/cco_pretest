<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Jobs\UpdateWallet;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(TransactionLog::class);
    }

    public function makeDeposit($amount)
    {
        $order_id = Str::random(5);
        Http::fake(['https://yourdomain.com/deposit' => Http::response(['order_id' => $order_id, 'amount' => $amount, 'status' => 1])], ['Headers']);


        // Make HTTP Request
        $response = Http::post('https://yourdomain.com/deposit', [
            'order_id' => $order_id,
            'amount' => $amount,
            'timestamp' => Carbon::now()->timestamp,
        ]);

        $r = $response->object();

        if ($r->status == 1) {
            $uw = new UpdateWallet($this->id, $amount, 'deposit', $r->status);
            dispatch($uw);
        }

        return $r;
    }

    public function makeWithdrawal($amount)
    {
        $uw = new UpdateWallet($this->id, $amount, 'withdrawal', 1);
        dispatch($uw);
    }
}
