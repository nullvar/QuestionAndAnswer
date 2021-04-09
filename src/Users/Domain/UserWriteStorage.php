<?php

declare(strict_types=1);

namespace App\Users\Domain;

interface UserWriteStorage
{
    public function add(User $user): void;
}