<?php

namespace Domain\Transaction\Usecases\SaveTransaction;

use Domain\Transaction\Transaction;

class AddNewTransaction
{
    public function __construct(
        private SaveTransactionRepository $saveTransaction,
    ) {}

    public function handle(AddNewTransactionInput $input): int
    {
        $transaction = Transaction::make(
            category_id: $input->category_id,
            type: $input->type,
            amount: $input->amount,
            due_date: $input->due_date,
            payment_date: $input->payment_date,
            description: $input->description,
        );

        $transaction_id = $this->saveTransaction->saveTransaction($transaction);

        return $transaction_id;
    }
}