<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Str;

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

        return $response->object();
    }
}
