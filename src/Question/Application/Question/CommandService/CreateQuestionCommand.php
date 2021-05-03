<?php

declare(strict_types=1);

namespace App\Question\Application\Question\CommandService;

use App\Question\Domain\Profile\ProfileId;
use App\Question\Domain\Question\QuestionId;

interface CreateQuestionCommand
{
    public function getTitle(): string;
    public function getContent(): string;
    public function getCreatedBy(): ProfileId;
}