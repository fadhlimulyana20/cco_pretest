<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\TransactionLog;

class UpdateWallet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $wallet_id;
    protected $amount;
    protected $type;
    protected $status;

    /**
     * Create a new job instance.
     */
    public function __construct($wallet_id, $amount, $type, $status)
    {
        $this->wallet_id = $wallet_id;
        $this->amount = $amount;
        $this->type = $type;
        $this->status = $status;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $tl = TransactionLog::createLog($this->amount, $this->wallet_id, $this->type, $this->status);
    }
}
