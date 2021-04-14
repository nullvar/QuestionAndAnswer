<?php

declare(strict_types=1);

namespace App\Core\Domain\User\Contract;

use App\Core\Domain\User\User as UserDomainModel;
use App\Core\Domain\User\UserId;

interface UserReadStorage
{
    public function getById(UserId $id): ?UserDomainModel;
}