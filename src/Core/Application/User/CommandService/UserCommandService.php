<?php

declare(strict_types=1);

namespace App\Core\Application\User\CommandService;

use App\Core\Application\User\CommandService\Contract\ChangeUserPasswordCommand;
use App\Core\Application\User\CommandService\Contract\CreateUserCommand;
use App\Core\Domain\User\Contract\PasswordEncoder;
use App\Core\Domain\User\Contract\UserWriteStorage;
use App\Core\Domain\User\Exception\UserNotFound;
use App\Core\Domain\User\User;
use App\Core\Domain\User\UserId;
use App\Core\Service\Persistence\Transaction;

class UserCommandService
{
    private PasswordEncoder $passwordEncoder;
    private UserWriteStorage $userWriteStorage;
    private Transaction $transaction;

    public function __construct(
        PasswordEncoder $passwordEncoder,
        UserWriteStorage $userWriteStorage,
        Transaction $transaction
    ) {
        $this->transaction = $transaction;
        $this->passwordEncoder = $passwordEncoder;
        $this->userWriteStorage = $userWriteStorage;
    }

    public function createUser(CreateUserCommand $command): UserId
    {
        $userId = new UserId();

        $this->transaction->transact(function() use ($userId, $command): void {
            $this->userWriteStorage->add(
                new User(
                    $userId,
                    $command->getUsername(),
                    $command->getPassword(),
                    $this->passwordEncoder,
                    $command->getRoles()
                )
            );
        });

        return $userId;
    }

    /**
     * @throws UserNotFound
     */
    public function changePassword(ChangeUserPasswordCommand $command): void
    {
        $this->transaction->transact(function() use ($command): void {
            $user = $this->getUser($command->getId());
            $user->changePassword(
                $command->getPassword(),
                $this->passwordEncoder
            );
        });
    }

    /**
     * @throws UserNotFound
     */
    private function getUser(UserId $id): User
    {
        $user = $this->userWriteStorage->getAndLock($id);
        if (null === $user) {
            throw new UserNotFound();
        }

        return $user;
    }
}