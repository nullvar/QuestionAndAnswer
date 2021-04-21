<?php

declare(strict_types=1);

namespace App\Core\Service\Persistence;

interface TransactionHandler
{
    public function begin(): void;
    public function commit(): void;
    public function rollback(): void;
    public function clear(): void;
}