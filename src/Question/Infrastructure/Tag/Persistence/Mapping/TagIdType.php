<?php

declare(strict_types=1);

namespace App\Question\Infrastructure\Tag\Persistence\Mapping;

use App\Question\Domain\Tag\TagId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class TagIdType extends Type
{
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return 'VARCHAR(30)';
    }

    /**
     * @param string $value
     * @param AbstractPlatform $platform
     * @return TagId
     * @throws \App\Question\Domain\Tag\Exception\TagIdTooLong
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new TagId($value);
    }

    /**
     * @param TagId $value
     * @param AbstractPlatform $platform
     * @return string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return (string) $value;
    }

    public function getName(): string
    {
        return 'tag_id';
    }
}