<?php

declare(strict_types=1);

namespace App\Users\Application\Queries;

use App\Users\Application\Queries\User as UserInterface;
use App\Users\Domain\User;

final class UserData implements UserInterface
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getId(): string
    {
        return (string) $this->user->getId();
    }

    public function getLogin(): string
    {
        return $this->user->getLogin();
    }

    public function getPassword(): string
    {
        return $this->user->getPassword();
    }
}