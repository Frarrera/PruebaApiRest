<?php
namespace App\Services;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionService extends Service{

    public function Create($product_id) {
        $transaction = new Transaction();
        $transaction->product_id = $product_id;
        $transaction->forceFill([
            'product_id' => $product_id,
            'quantity' => $this->request->input('quantity'),
            'user_id' => $this->request->user()->id
        ]);
        $transaction->saveOrFail();
    }
}