<?php

declare(strict_types=1);

namespace App\Question\Domain\Answer;

interface AnswerWriteStorage
{
    public function add(Answer $answer): void;
}