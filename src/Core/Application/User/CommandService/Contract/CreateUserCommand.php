<?php

declare(strict_types=1);

namespace App\Core\Application\User\CommandService\Contract;

interface CreateUserCommand
{
    public function getUsername(): string;
    public function getPassword(): string;

    /** @return string[] */
    public function getRoles(): array;
}