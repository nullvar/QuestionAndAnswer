<?php

declare(strict_types=1);

namespace App\Question\Domain\Profile;

use App\Core\Domain\User\UserId;

class Profile
{
    private ProfileId $id;
    private string $name;
    private UserId $userId;

    public function __construct(ProfileId $id, string $name, UserId $userId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->userId = $userId;
    }

    public function getId(): ProfileId
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }
}