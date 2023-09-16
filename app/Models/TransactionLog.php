<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TransactionLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'type',
        'amount',
        'status',
        'wallet_id',
    ];

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }

    public static function createLog($amount, $wallet_id, $type, $status)
    {
        $order_id = Str::random(5);

        if ($status == 1)
        {
            $w = Wallet::find($wallet_id);
            if ($type == 'deposit')
            {
                $w->amount += $amount;
            } else
            {
                $w->amount -= $amount;
            }
            $w->save();
        }

        $tl = TransactionLog::create([
            'order_id' => $order_id,
            'type' => $type,
            'amount' => $amount,
            'status' => $status,
            'wallet_id' => $wallet_id,
        ]);

        return $tl;
    }
}
