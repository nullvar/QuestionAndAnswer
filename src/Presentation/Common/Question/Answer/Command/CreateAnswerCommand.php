<?php

declare(strict_types=1);

namespace App\Presentation\Common\Question\Answer\Command;

use App\Question\Application\Answer\CommandService\CreateAnswerCommand as CreateAnswerCommandInterface;
use App\Question\Domain\Profile\ProfileId;
use App\Question\Domain\Question\QuestionId;

final class CreateAnswerCommand implements CreateAnswerCommandInterface
{
    private string $content;
    private string $belongsTo;
    private string $profileId;

    public function __construct(string $content, string $belongsTo, string $profileId)
    {
        $this->content = $content;
        $this->belongsTo = $belongsTo;
        $this->profileId = $profileId;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getBelongsTo(): QuestionId
    {
        return new QuestionId($this->belongsTo);
    }

    public function getCreatedBy(): ProfileId
    {
        return new ProfileId($this->profileId);
    }
}