<?php

declare(strict_types=1);

namespace App\Question\Domain\Answer;

use App\Question\Domain\Author\AuthorId;
use App\Question\Domain\Question\QuestionId;

class Answer
{
    private AnswerId $id;
    private string $content;
    private QuestionId $belongsTo;
    private \DateTimeImmutable $createdAt;
    private AuthorId $createdBy;

    public function __construct(
        AnswerId $id,
        string $content,
        QuestionId $belongsTo,
        AuthorId $createdBy
    ) {
        $this->id = $id;
        $this->content = $content;
        $this->belongsTo = $belongsTo;
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
    }

    public function getId(): AnswerId
    {
        return $this->id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getBelongsTo(): QuestionId
    {
        return $this->belongsTo;
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