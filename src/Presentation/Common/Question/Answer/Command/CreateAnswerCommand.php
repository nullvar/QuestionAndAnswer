<?php

declare(strict_types=1);

namespace App\Presentation\Common\Question\Answer\Command;

use App\Question\Application\Answer\CommandService\CreateAnswerCommand as CreateAnswerCommandInterface;
use App\Question\Domain\Author\AuthorId;
use App\Question\Domain\Question\QuestionId;

final class CreateAnswerCommand implements CreateAnswerCommandInterface
{
    private string $content;
    private string $questionId;
    private string $authorId;

    public function __construct(string $content, string $questionId, string $authorId)
    {
        $this->content = $content;
        $this->questionId = $questionId;
        $this->authorId = $authorId;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getQuestionId(): QuestionId
    {
        return new QuestionId($this->questionId);
    }

    public function getAuthorId(): AuthorId
    {
        return new AuthorId($this->authorId);
    }
}