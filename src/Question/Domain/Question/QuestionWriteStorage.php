<?php

declare(strict_types=1);

namespace App\Question\Domain\Question;

interface QuestionWriteStorage
{
    public function add(Question $question): void;
}