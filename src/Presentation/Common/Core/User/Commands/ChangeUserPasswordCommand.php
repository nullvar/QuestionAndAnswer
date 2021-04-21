<?php

declare(strict_types=1);

namespace App\Presentation\Common\Core\User\Commands;

use App\Core\Application\User\CommandService\Contract\ChangeUserPasswordCommand as ChangeUserPasswordCommandInterface;
use App\Core\Domain\User\UserId;

final class ChangeUserPasswordCommand implements ChangeUserPasswordCommandInterface
{
    private string $userId;
    private string $password;

    public function __construct(string $userId, string $password)
    {
        $this->userId = $userId;
        $this->password = $password;
    }

    public function getId(): UserId
    {
        return new UserId($this->userId);
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}