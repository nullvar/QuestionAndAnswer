<?php

declare(strict_types=1);

namespace App\Core\Application\User\CommandService;

use App\Core\Domain\User\UserId;

interface ChangeUserPasswordCommand
{
    public function getId(): UserId;
    public function getPassword(): string;
}