<?php

declare(strict_types=1);

namespace App\Users\Domain;

use App\Common\Exceptions\DomainException;

final class UserNotFound extends DomainException
{
}