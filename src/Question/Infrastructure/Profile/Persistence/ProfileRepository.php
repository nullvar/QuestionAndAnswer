<?php

declare(strict_types=1);

namespace App\Question\Infrastructure\Profile\Persistence;

use App\Question\Domain\Profile\Profile;
use App\Question\Domain\Profile\ProfileId;
use App\Question\Domain\Profile\ProfileWriteStorage;
use Doctrine\ORM\EntityRepository;

class ProfileRepository extends EntityRepository implements ProfileWriteStorage
{
    public function getAndLock(ProfileId $id): ?Profile
    {
        // TODO: Implement getAndLock() method.

        /** @var  null|Profile $profile */
        $profile = $this->find((string) $id);

        return $profile;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     */
    public function add(Profile $profile): void
    {
        $this->getEntityManager()->persist($profile);
    }
}
