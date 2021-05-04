<?php

declare(strict_types=1);

namespace App\Question\Domain\Answer;

use App\Question\Domain\Author\AuthorId;
use App\Question\Domain\Question\QuestionId;

class Answer
{
    private AnswerId $id;
    private string $content;
    private QuestionId $questionId;
    private \DateTimeImmutable $createdAt;
    private AuthorId $authorId;

    public function __construct(
        AnswerId $id,
        string $content,
        QuestionId $questionId,
        AuthorId $authorId
    ) {
        $this->id = $id;
        $this->content = $content;
        $this->questionId = $questionId;
        $this->createdAt = new \DateTimeImmutable();
        $this->authorId = $authorId;
    }

    public function getId(): AnswerId
    {
        return $this->id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getQuestionId(): QuestionId
    {
        return $this->questionId;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getAuthorId(): AuthorId
    {
        return $this->authorId;
    }
}