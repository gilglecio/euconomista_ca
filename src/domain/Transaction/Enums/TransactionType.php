<?php

namespace Domain\Transaction\Enums;

enum TransactionType: string
{
    case INCOME = 'income';

    case EXPENSE = 'expense';
}