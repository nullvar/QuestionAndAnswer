<?php

declare(strict_types=1);

namespace App\Presentation\Common\Core\User\Command;

use App\Core\Application\User\CommandService\CreateUserCommand as CreateUserCommandInterface;

final class CreateUserCommand implements CreateUserCommandInterface
{
    private string $username;
    private string $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRoles(): array
    {
        return [];
    }
}