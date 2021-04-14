<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Persistence\User;

use App\Core\Domain\User\Contract\UserReadStorage;
use App\Core\Domain\User\Contract\UserWriteStorage;
use App\Core\Domain\User\User as UserDomainModel;
use App\Core\Domain\User\UserId;

class UserRepository implements UserWriteStorage, UserReadStorage
{
    public function getById(UserId $id): ?UserDomainModel
    {
        // TODO: Implement getById() method.
    }

    public function getAndLock(UserId $id): ?UserDomainModel
    {
        // TODO: Implement getAndLock() method.
    }

    public function add(UserDomainModel $user): void
    {
        // TODO: Implement add() method.
    }
}