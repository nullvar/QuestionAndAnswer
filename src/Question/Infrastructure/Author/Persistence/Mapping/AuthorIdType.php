<?php

declare(strict_types=1);

namespace App\Question\Infrastructure\Author\Persistence\Mapping;

use App\Question\Domain\Author\AuthorId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Symfony\Component\Uid\UuidV4;

class AuthorIdType extends Type
{
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return 'uuid';
    }

    /**
     * @param string|UuidV4 $value
     * @param AbstractPlatform $platform
     * @return AuthorId
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof UuidV4) {
            $value = (string) $value;
        }

        return new AuthorId($value);
    }

    /**
     * @param AuthorId $value
     * @param AbstractPlatform $platform
     * @return string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return (string) $value;
    }

    public function getName(): string
    {
        return 'author_id';
    }
}