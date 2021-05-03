<?php

declare(strict_types=1);

namespace App\Question\Domain\Answer;

use App\Question\Domain\Profile\ProfileId;
use App\Question\Domain\Question\QuestionId;

class Answer
{
    private AnswerId $id;
    private string $content;
    private QuestionId $belongsTo;
    private \DateTimeImmutable $createdAt;
    private ProfileId $createdBy;

    public function __construct(AnswerId $id, string $content, QuestionId $belongsTo, \DateTimeImmutable $createdAt, ProfileId $createdBy)
    {
        $this->id = $id;
        $this->content = $content;
        $this->belongsTo = $belongsTo;
        $this->createdAt = $createdAt;
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

    public function getCreatedBy(): ProfileId
    {
        return $this->createdBy;
    }
}