<?php

declare(strict_types=1);

namespace App\Question\Application\Question\CommandService;

use App\Core\Service\Persistence\Transaction;
use App\Question\Domain\Question\Question;
use App\Question\Domain\Question\QuestionId;
use App\Question\Domain\Question\QuestionWriteStorage;

class QuestionCommandService
{
    private QuestionWriteStorage $questionWriteStorage;
    private Transaction $transaction;

    public function __construct(
        QuestionWriteStorage $questionWriteStorage,
        Transaction $transaction
    ) {
        $this->questionWriteStorage = $questionWriteStorage;
        $this->transaction = $transaction;
    }

    public function createQuestion(CreateQuestionCommand $command): QuestionId
    {
        $questionId = new QuestionId();
        $this->transaction->transact(function () use ($questionId, $command): void {
            $this->questionWriteStorage->add(
                new Question(
                    $questionId,
                    $command->getTitle(),
                    $command->getContent(),
                    $command->getCreatedBy()
                )
            );
        });

        return $questionId;
    }
}