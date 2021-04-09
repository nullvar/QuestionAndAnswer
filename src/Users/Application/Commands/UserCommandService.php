<?php

declare(strict_types=1);

namespace App\Users\Application\Commands;

use App\Users\Domain\User;
use App\Users\Domain\UserWriteStorage;
use Symfony\Component\Uid\Uuid;

final class UserCommandService
{
    private UserWriteStorage $userWriteStorage;

    public function __construct(UserWriteStorage $userWriteStorage)
    {
        $this->userWriteStorage = $userWriteStorage;
    }

    public function createUser(CreateUserCommand $command): Uuid
    {
        $user =
            new User(
                Uuid::v4(),
                $command->getLogin(),
                $command->getPassword()
            )
        ;

        $this->userWriteStorage->add($user);

        return $user->getId();
    }
}