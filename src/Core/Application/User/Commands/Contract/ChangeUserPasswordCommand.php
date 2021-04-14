<?php

declare(strict_types=1);

namespace App\Core\Application\User\Commands\Contract;

use Symfony\Component\Uid\Uuid;

interface ChangeUserPasswordCommand
{
    public function getId(): Uuid;
    public function getPassword(): string;
}