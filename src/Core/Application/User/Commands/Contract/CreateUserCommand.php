<?php

declare(strict_types=1);

namespace App\Core\Application\User\Commands\Contract;

interface CreateUserCommand
{
    public function getUsername(): string;
    public function getPassword(): string;

    /** @return string[] */
    public function getRoles(): array;
}