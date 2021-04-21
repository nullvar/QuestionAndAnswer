<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Persistence;

use App\Core\Service\Persistence\Transaction as TransactionInterface;
use App\Core\Service\Persistence\TransactionHandler as TransactionHandlerInterface;

class Transaction implements TransactionInterface
{
    private TransactionHandlerInterface $transactionHandler;

    public function __construct(TransactionHandlerInterface $transactionHandler)
    {
        $this->transactionHandler = $transactionHandler;
    }

    public function transact(callable $func): void
    {
        $this->transactionHandler->begin();
        try {
            call_user_func($func);
        } catch (\Throwable $throwable) {
            $this->transactionHandler->rollback();;
        }

        $this->transactionHandler->commit();
    }

    public function clear(): void
    {
        $this->transactionHandler->clear();
    }
}