<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Persistence\User;

use App\Core\Domain\User\Contract\PasswordEncoder as PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

final class PasswordEncoder extends UserPasswordEncoder implements PasswordEncoderInterface
{
}