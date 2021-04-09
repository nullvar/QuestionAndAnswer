<?php

declare(strict_types=1);

namespace App\Users\Application\Queries;

use App\Users\Domain\UserNotFound;
use App\Users\Domain\UserReadStorage;
use Symfony\Component\Uid\Uuid;

final class UserQueryService
{
    private UserReadStorage $userReadStorage;

    public function __construct(UserReadStorage $userReadStorage)
    {
        $this->userReadStorage = $userReadStorage;
    }

    /**
     * @throws UserNotFound
     */
    public function getUser(Uuid $id): User
    {
        $user = $this->userReadStorage->getById($id);
        if (null === $user) {
            throw new UserNotFound();
        }

        return new UserData($user);
    }
}