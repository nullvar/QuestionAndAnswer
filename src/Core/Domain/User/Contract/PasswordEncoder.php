<?php

declare(strict_types=1);

namespace App\Core\Domain\User\Contract;

use Symfony\Component\Security\Core\User\UserInterface;

interface PasswordEncoder
{
    /**
     * Encodes the plain password.
     *
     * @return string The encoded password
     */
    public function encodePassword(UserInterface $user, string $plainPassword);

    /**
     * @return bool true if the password is valid, false otherwise
     */
    public function isPasswordValid(UserInterface $user, string $raw);

    /**
     * Checks if an encoded password would benefit from rehashing.
     */
    public function needsRehash(UserInterface $user): bool;
}