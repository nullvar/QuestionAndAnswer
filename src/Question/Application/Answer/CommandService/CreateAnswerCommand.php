<?php

declare(strict_types=1);

namespace App\Question\Application\Answer\CommandService;

use App\Question\Domain\Profile\ProfileId;
use App\Question\Domain\Question\QuestionId;

interface CreateAnswerCommand
{
    public function getContent(): string;
    public function getBelongsTo(): QuestionId;
    public function getCreatedBy(): ProfileId;
}