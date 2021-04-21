<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Persistence\User\Mapping;

use App\Core\Domain\User\UserId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Symfony\Component\Uid\UuidV4;

class UserIdType extends Type
{
    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return 'uuid';
    }

    /**
     * @param string|UuidV4 $value
     * @param AbstractPlatform $platform
     * @return UserId
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value instanceof UuidV4) {
            $value = (string) $value;
        }

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