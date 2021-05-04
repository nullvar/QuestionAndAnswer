<?php

declare(strict_types=1);

namespace App\Presentation\Common\Question\Question\Command;

use App\Question\Application\Question\CommandService\CreateQuestionCommand as CreateQuestionCommandInterface;
use App\Question\Domain\Author\AuthorId;
use App\Question\Domain\Question\QuestionId;

final class CreateQuestionCommand implements CreateQuestionCommandInterface
{
    private string $title;
    private string $content;
    private string $authorId;

    public function __construct(string $title, string $content, string $authorId)
    {
        $this->title = $title;
        $this->content = $content;
        $this->authorId = $authorId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getAuthorId(): AuthorId
    {
        return new AuthorId($this->authorId);
    }
}