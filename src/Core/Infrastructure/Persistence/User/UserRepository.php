<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Persistence\User;

use App\Core\Domain\User\Contract\UserReadStorage;
use App\Core\Domain\User\Contract\UserWriteStorage;
use App\Core\Domain\User\User as UserDomainModel;
use App\Core\Domain\User\UserId;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository implements UserWriteStorage, UserReadStorage
{
    public function getById(UserId $id): ?UserDomainModel
    {
        /** @var null|UserDomainModel $user */
        $user = $this->find((string) $id);

        return $user;
    }

    public function getAndLock(UserId $id): ?UserDomainModel
    {
        // todo: add pessimistic transaction lock
        return $this->getById($id);
    }

    public function add(UserDomainModel $user): void
    {
        $this->getEntityManager()->persist($user);
    }
}