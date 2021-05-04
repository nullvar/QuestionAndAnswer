<?php

declare(strict_types=1);

namespace App\Question\Domain\Tag\Exception;

use App\Core\Domain\Exception\DomainException;

final class TagDescriptionToLong extends DomainException
{
}