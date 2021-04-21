<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Persistence\User\Mapping;

use App\Core\Domain\User\UserId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class UserIdType extends Type
{
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return 'uuid';
    }

    /**
     * @param string $value
     * @param AbstractPlatform $platform
     * @return UserId
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new UserId($value);
    }

    /**
     * @param UserId $value
     * @param AbstractPlatform $platform
     * @return string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return (string) $value;
    }

    public function getName(): string
    {
        return 'user_id';
    }
}