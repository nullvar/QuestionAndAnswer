<?php

declare(strict_types=1);

namespace App\Question\Domain\Author;

use App\Core\Domain\User\UserId;

class Author
{
    private AuthorId $id;
    private string $name;
    private UserId $userId;

    public function __construct(AuthorId $id, string $name, UserId $userId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->userId = $userId;
    }

    public function getId(): AuthorId
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