<?php

declare(strict_types=1);

namespace App\Presentation\Common\Question\Tag;

use App\Question\Application\Tag\CommandService\CreatedTagCommand as CreatedTagCommandInterface;
use App\Question\Domain\Tag\TagId;

final class CreatedTagCommand implements CreatedTagCommandInterface
{
    private string $tagId;
    private string $description;

    public function __construct(string $tagId, string $description)
    {
        $this->tagId = $tagId;
        $this->description = $description;
    }

    /**
     * @throws \App\Question\Domain\Tag\Exception\TagIdTooLong
     */
    public function getTagId(): TagId
    {
        return new TagId($this->tagId);
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}