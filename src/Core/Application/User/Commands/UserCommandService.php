<?php

declare(strict_types=1);

namespace App\Core\Application\User\Commands;

use App\Core\Application\User\Commands\Contract\ChangeUserPasswordCommand;
use App\Core\Application\User\Commands\Contract\CreateUserCommand;
use App\Core\Domain\User\Contract\PasswordEncoder;
use App\Core\Domain\User\Contract\UserWriteStorage;
use App\Core\Domain\User\Exception\UserNotFound;
use App\Core\Domain\User\User;
use Symfony\Component\Uid\Uuid;

class UserCommandService
{
    private PasswordEncoder $passwordEncoder;
    private UserWriteStorage $userWriteStorage;

    public function __construct(PasswordEncoder $passwordEncoder, UserWriteStorage $userWriteStorage)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->userWriteStorage = $userWriteStorage;
    }

    public function createUser(CreateUserCommand $command): Uuid
    {
        $user =
            new User(
                Uuid::v4(),
                $command->getUsername(),
                $command->getPassword(),
                $this->passwordEncoder,
                $command->getRoles()
            )
        ;

        $this->userWriteStorage->add($user);

        return $user->getId();
    }

    public function changePassword(ChangeUserPasswordCommand $command): void
    {
        $user = $this->getUser($command->getId());
        $user->changePassword($command->getPassword(), $this->passwordEncoder);
    }

    /**
     * @throws UserNotFound
     */
    private function getUser(Uuid $id): User
    {
        $user = $this->userWriteStorage->getAndLock($id);
        if (null === $user) {
            throw new UserNotFound();
        }

        return $user;
    }
}