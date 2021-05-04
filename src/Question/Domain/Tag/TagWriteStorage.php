<?php

declare(strict_types=1);

namespace App\Question\Domain\Tag;

interface TagWriteStorage
{
    public function add(Tag $tag): void;
}