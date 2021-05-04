<?php

declare(strict_types=1);

namespace App\Question\Application\Question\CommandService;

use App\Question\Domain\Author\AuthorId;

interface CreateQuestionCommand
{
    public function getTitle(): string;
    public function getContent(): string;
    public function getAuthorId(): AuthorId;
}