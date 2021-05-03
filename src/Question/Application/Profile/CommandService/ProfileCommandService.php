<?php

declare(strict_types=1);

namespace App\Question\Application\Profile\CommandService;

use App\Core\Infrastructure\Persistence\Transaction;
use App\Question\Domain\Profile\Profile;
use App\Question\Domain\Profile\ProfileId;
use App\Question\Domain\Profile\ProfileWriteStorage;

class ProfileCommandService
{
    private ProfileWriteStorage $profileWriteStorage;
    private Transaction $transaction;

    public function __construct(
        ProfileWriteStorage $profileWriteStorage,
        Transaction $transaction
    ) {
        $this->profileWriteStorage = $profileWriteStorage;
        $this->transaction = $transaction;
    }

    public function createProfile(CreateProfileCommand $command): ProfileId
    {
        $profileId = new ProfileId();
        $this->transaction->transact(function () use ($profileId, $command): void {
            $this->profileWriteStorage->add(
                new Profile(
                    $profileId,
                    $command->getName(),
                    $command->getUserId()
                )
            );
        });

        return $profileId;
    }
}