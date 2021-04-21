<?php

declare(strict_types=1);

namespace App\Core\Services\Persistence;

interface Transaction
{
    public function transact(callable $func): void;
    public function clear(): void;
}