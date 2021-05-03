<?php

declare(strict_types=1);

namespace App\Question\Infrastructure\Question\Persistence\Mapping;

use App\Question\Domain\Question\QuestionId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Symfony\Component\Uid\UuidV4;

class QuestionIdType extends Type
{
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return 'uuid';
    }

    /**
     * @param string|UuidV4 $value
     * @param AbstractPlatform $platform
     * @return QuestionId
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof UuidV4) {
            $value = (string) $value;
        }

        return new QuestionId($value);
    }

    /**
     * @param QuestionId $value
     * @param AbstractPlatform $platform
     * @return string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return (string) $value;
    }

    public function getName(): string
    {
        return 'question_id';
    }
}