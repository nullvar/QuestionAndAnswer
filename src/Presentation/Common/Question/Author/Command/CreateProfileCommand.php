<?php

declare(strict_types=1);

namespace App\Presentation\Common\Question\Author\Command;

use App\Core\Domain\User\User;
use App\Core\Domain\User\UserId;
use App\Question\Application\Author\CommandService\CreateAuthorCommand as CreateAuthorCommandInterface;

final class CreateAuthorCommand implements CreateAuthorCommandInterface
{
    private string $name;
    private string $userId;

    public function __construct(string $name, string $userId)
    {
        $this->name = $name;
        $this->userId = $userId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUserId(): UserId
    {
        return new UserId($this->userId);
    }
}