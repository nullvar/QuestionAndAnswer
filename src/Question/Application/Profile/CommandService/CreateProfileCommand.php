<?php

declare(strict_types=1);

namespace App\Question\Application\Profile\CommandService;

use App\Core\Domain\User\UserId;
use App\Question\Domain\Profile\ProfileId;

interface CreateProfileCommand
{
    public function getName(): string;
    public function getUserId(): UserId;
}