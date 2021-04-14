<?php

declare(strict_types=1);

namespace App\Core\Domain\User\Exception;

use App\Core\Domain\Exception\DomainException;

final class UserNotFound extends DomainException
{
}