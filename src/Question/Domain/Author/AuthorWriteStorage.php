<?php

declare(strict_types=1);

namespace App\Question\Domain\Author;

interface AuthorWriteStorage
{
    public function getAndLock(AuthorId $id): ?Author;
    public function add(Author $author): void;
}