<?php

declare(strict_types=1);

namespace App\Question\Application\Answer\CommandService;

use App\Question\Domain\Author\AuthorId;
use App\Question\Domain\Question\QuestionId;

interface CreateAnswerCommand
{
    public function getContent(): string;
    public function getQuestionId(): QuestionId;
    public function getAuthorId(): AuthorId;
}