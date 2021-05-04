<?php

declare(strict_types=1);

namespace App\Question\Application\Author\CommandService;

use App\Core\Infrastructure\Persistence\Transaction;
use App\Question\Domain\Author\Author;
use App\Question\Domain\Author\AuthorId;
use App\Question\Domain\Author\AuthorWriteStorage;

class AuthorCommandService
{
    private AuthorWriteStorage $authorWriteStorage;
    private Transaction $transaction;

    public function __construct(
        AuthorWriteStorage $authorWriteStorage,
        Transaction $transaction
    ) {
        $this->authorWriteStorage = $authorWriteStorage;
        $this->transaction = $transaction;
    }

    public function createauthor(CreateAuthorCommand $command): AuthorId
    {
        $authorId = new AuthorId();
        $this->transaction->transact(function () use ($authorId, $command): void {
            $this->authorWriteStorage->add(
                new Author(
                    $authorId,
                    $command->getName(),
                    $command->getUserId()
                )
            );
        });

        return $authorId;
    }
}