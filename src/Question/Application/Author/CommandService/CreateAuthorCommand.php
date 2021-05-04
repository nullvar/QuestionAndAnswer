<?php

declare(strict_types=1);

namespace App\Question\Application\Author\CommandService;

use App\Core\Domain\User\UserId;
use App\Question\Domain\Author\AuthorId;

interface CreateAuthorCommand
{
    public function getName(): string;
    public function getUserId(): UserId;
}