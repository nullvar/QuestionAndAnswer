<?php

declare(strict_types=1);

namespace App\Question\Domain\Question;

use App\Question\Domain\Author\AuthorId;

class Question
{
    private QuestionId $id;
    private int $sequenceId;
    private string $title;
    private string $content;
    private \DateTimeImmutable $createdAt;
    private AuthorId $createdBy;

    public function __construct(
        QuestionId $id,
        string $title,
        string $content,
        AuthorId $createdBy
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
    }

    public function getId(): QuestionId
    {
        return $this->id;
    }

    public function getSequenceId(): int
    {
        return $this->sequenceId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getCreatedBy(): AuthorId
    {
        return $this->createdBy;
    }
}