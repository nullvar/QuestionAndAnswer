<?php

declare(strict_types=1);

namespace App\Core\Domain\User\Contract;

use App\Core\Domain\User\User as UserDomainModel;
use Symfony\Component\Uid\Uuid;

interface UserReadStorage
{
    public function getById(Uuid $id): ?UserDomainModel;
}