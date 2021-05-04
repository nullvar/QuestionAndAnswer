<?php

declare(strict_types=1);

namespace App\Question\Application\Tag\CommandService;

use App\Core\Service\Persistence\Transaction;
use App\Question\Domain\Tag\Tag;
use App\Question\Domain\Tag\TagId;
use App\Question\Domain\Tag\TagWriteStorage;

class TagCommandService
{
    private TagWriteStorage $tagWriteStorage;
    private Transaction $transaction;

    public function __construct(
        TagWriteStorage $tagWriteStorage,
        Transaction $transaction
    )
    {
        $this->tagWriteStorage = $tagWriteStorage;
        $this->transaction = $transaction;
    }

    public function createTag(CreatedTagCommand $command): TagId
    {
        $this->transaction->transact(function () use ($command): void {
            $this->tagWriteStorage->add(
                new Tag(
                    $command->getTagId(),
                    $command->getDescription()
                )
            );
        });

        return $command->getTagId();
    }
}