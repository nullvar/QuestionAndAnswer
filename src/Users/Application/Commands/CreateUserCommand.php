<?php

declare(strict_types=1);

namespace App\Users\Application\Commands;

interface CreateUserCommand
{
    public function getLogin(): string;
    public function getPassword(): string;
}