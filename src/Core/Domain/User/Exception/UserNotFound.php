<?php

declare(strict_types=1);

namespace App\Core\Domain\User\Exception;

use App\Core\Domain\DomainException;

final class UserNotFound extends DomainException
{
}