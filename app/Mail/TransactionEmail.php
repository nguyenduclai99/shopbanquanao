<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Transaction;


class TransactionEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $transactions;
    private $transactionID;
    public function __construct($transactions,$transactionID)
    {
        $this->transactions = $transactions;
        $this->info = Transaction::where('id',$transactionID)->first();
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.transaction')
                    ->with([
                        'shopping' => $this->transactions,
                        'info' => $this->info
                    ]);
    }
}
