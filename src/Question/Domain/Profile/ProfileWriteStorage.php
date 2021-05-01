<?php

declare(strict_types=1);

namespace App\Question\Domain\Profile;

interface ProfileWriteStorage
{
    public function getAndLock(ProfileId $id): ?Profile;
    public function add(Profile $profile): void;
}