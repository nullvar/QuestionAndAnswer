<?php

declare(strict_types=1);

namespace App\Question\Application\Tag\CommandService;

use App\Question\Domain\Tag\TagId;

interface CreatedTagCommand
{
    public function getTagId(): TagId;
    public function getDescription(): string;
}