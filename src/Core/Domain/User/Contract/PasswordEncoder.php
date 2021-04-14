<?php

declare(strict_types=1);

namespace App\Core\Domain\User\Contract;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

interface PasswordEncoder extends UserPasswordEncoderInterface
{
}