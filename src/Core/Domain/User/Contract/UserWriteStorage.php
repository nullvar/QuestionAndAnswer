<?php

declare(strict_types=1);

namespace App\Core\Domain\User\Contract;

use App\Core\Domain\User\User as UserDomainModel;
use Symfony\Component\Uid\Uuid;

interface UserWriteStorage
{
    public function getAndLock(Uuid $id): ?UserDomainModel;
    public function add(UserDomainModel $user): void;
}