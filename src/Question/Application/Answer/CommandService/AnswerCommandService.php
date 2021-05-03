<?php

declare(strict_types=1);

namespace App\Question\Application\Answer\CommandService;

use App\Core\Service\Persistence\Transaction;
use App\Question\Domain\Answer\Answer;
use App\Question\Domain\Answer\AnswerId;
use App\Question\Domain\Answer\AnswerWriteStorage;

class AnswerCommandService
{
    private AnswerWriteStorage $answerWriteStorage;
    private Transaction $transaction;

    public function __construct(
        AnswerWriteStorage $answerWriteStorage,
        Transaction $transaction
    ) {
        $this->answerWriteStorage = $answerWriteStorage;
        $this->transaction = $transaction;
    }

    public function createAnswer(CreateAnswerCommand $command): AnswerId
    {
        $answerId = new AnswerId();

        $this->transaction->transact(function () use ($answerId, $command): void {
            $this->answerWriteStorage->add(
                new Answer(
                    $answerId,
                    $command->getContent(),
                    $command->getBelongsTo(),
                    $command->getCreatedBy()
                )
            );
        });

        return $answerId;
    }

}