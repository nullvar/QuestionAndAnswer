<?php

declare(strict_types=1);

namespace App\Question\Domain\Tag;

use App\Question\Domain\Tag\Exception\TagIdTooLong;

final class TagId
{
    private string $value;

    /**
     * @throws TagIdTooLong
     */
    public function __construct(string $value)
    {
        if (strlen($value) > 30) {
            throw new TagIdTooLong();
        }

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}