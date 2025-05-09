<?php

namespace Domain\Transaction\Usecases\SaveTransaction;

class AddNewTransactionInput
{
    public function __construct(
        public readonly int $category_id,
        public readonly string $type,
        public readonly int $amount,
        public readonly string $due_date,
        public readonly ?string $payment_date = null,
        public readonly string $description,
    ) {}
}