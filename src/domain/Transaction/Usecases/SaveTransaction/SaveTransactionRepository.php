<?php

namespace Domain\Transaction\Usecases\SaveTransaction;

use Domain\Transaction\Transaction;

interface SaveTransactionRepository
{
    public function saveTransaction(Transaction $transaction) : int;
}