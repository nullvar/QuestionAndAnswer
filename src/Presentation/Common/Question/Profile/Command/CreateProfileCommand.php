<?php

declare(strict_types=1);

namespace App\Presentation\Common\Question\Profile\Command;

use App\Core\Domain\User\User;
use App\Core\Domain\User\UserId;
use App\Question\Application\Profile\CommandService\CreateProfileCommand as CreateProfileCommandInterface;

final class CreateProfileCommand implements CreateProfileCommandInterface
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