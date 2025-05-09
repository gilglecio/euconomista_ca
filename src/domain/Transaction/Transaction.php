<?php

namespace Domain\Transaction;

use Domain\Transaction\Enums\TransactionType;
use Domain\ValueObjects\Amount;
use Domain\ValueObjects\DateImmutable;
use Domain\ValueObjects\UnsignedInteger;

class Transaction
{
    private function __construct(
        public readonly ?UnsignedInteger $id,
        public readonly UnsignedInteger $category_id,
        public readonly TransactionType $type,
        public readonly Amount $amount,
        public readonly DateImmutable $due_date,
        public readonly ?DateImmutable $payment_date,
        public readonly string $description,
    ) {}

    public static function make(int $category_id, string $type, int $amount, string $due_date, string $description, ?string $payment_date = null, ?int $id = null): self
    {
        return new Transaction(
            id: $id ? new UnsignedInteger($id) : null,
            category_id: new UnsignedInteger($category_id),
            type: TransactionType::from($type),
            amount: new Amount($amount),
            due_date: new DateImmutable($due_date),
            payment_date: $payment_date ? new DateImmutable($payment_date) : null,
            description: $description
        );
    }
}