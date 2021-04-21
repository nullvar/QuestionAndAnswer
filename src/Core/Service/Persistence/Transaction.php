<?php

declare(strict_types=1);

namespace App\Core\Service\Persistence;

interface Transaction
{
    public function transact(callable $func): void;
    public function clear(): void;
}