<?php

declare(strict_types=1);

namespace App\Question\Domain\Tag;

use App\Question\Domain\Tag\Exception\TagDescriptionToLong;

class Tag
{
    private TagId $id;
    private string $description;

    /**
     * @throws TagDescriptionToLong
     */
    public function __construct(TagId $id, string $description)
    {
        $this->id = $id;
        $this->setDescription($description);
    }

    /**
     * @throws TagDescriptionToLong
     */
    private function setDescription(string $description): void
    {
        if (strlen($description) > 250) {
            throw new TagDescriptionToLong();
        }

        $this->description = $description;
    }

    public function getId(): TagId
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}