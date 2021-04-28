<?php

declare(strict_types=1);

namespace App\Core\Domain\User;

use App\Core\Domain\User\User as UserDomainModel;

interface UserWriteStorage
{
    public function getAndLock(UserId $id): ?UserDomainModel;
    public function add(UserDomainModel $user): void;
}