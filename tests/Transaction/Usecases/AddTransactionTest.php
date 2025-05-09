<?php

use Domain\Transaction\Transaction;
use Domain\Transaction\Usecases\SaveTransaction\AddNewTransaction;
use Domain\Transaction\Usecases\SaveTransaction\AddNewTransactionInput;
use Domain\Transaction\Usecases\SaveTransaction\SaveTransactionRepository;

class AddTransactionTest extends \PHPUnit\Framework\TestCase
{
    public function test_add_income_transaction(): void
    {
        $saveTransaction = new class implements SaveTransactionRepository {
            public function saveTransaction(Transaction $transaction) : int {
                return 1;
            }
        };

        $usecase = new AddNewTransaction($saveTransaction);

        $input = new AddNewTransactionInput(category_id: 1, amount: 100, type: 'income', description: 'description', due_date: '2025-05-15', payment_date: null);

        $transaction_id = $usecase->handle($input);

        $this->assertEquals(1, $transaction_id);
    }

    public function test_add_expense_transaction(): void
    {
        $saveTransaction = new class implements SaveTransactionRepository {
            public function saveTransaction(Transaction $transaction) : int {
                return 1;
            }
        };

        $usecase = new AddNewTransaction($saveTransaction);

        $input = new AddNewTransactionInput(category_id: 1, amount: 100, type: 'expense', description: 'description', due_date: '2025-05-15', payment_date: null);

        $transaction_id = $usecase->handle($input);

        $this->assertEquals(1, $transaction_id);
    }

    public function test_add_transaction_invalid_amount(): void
    {
        $saveTransaction = new class implements SaveTransactionRepository {
            public function saveTransaction(Transaction $transaction) : int {
                return 1;
            }
        };

        $this->expectExceptionMessage('the input must be greater than zero');
        
        (new AddNewTransaction($saveTransaction))->handle(
            new AddNewTransactionInput(category_id: 1, amount: 0, type: 'income', description: 'description', due_date: '2025-05-15', payment_date: null)
        );

        (new AddNewTransaction($saveTransaction))->handle(
            new AddNewTransactionInput(category_id: 1, amount: 0, type: 'expense', description: 'description', due_date: '2025-05-15', payment_date: null)
        );
    }
}