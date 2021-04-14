<?php

declare(strict_types=1);

namespace App\Core\Domain\User;

use App\Core\Domain\User\Contract\PasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\UserPassportInterface;
use Symfony\Component\Uid\Uuid;

class User implements UserInterface
{
    private Uuid $id;
    private string $username;
    private string $password;

    /** @var string[] */
    private array $roles;

    /**
     * @param string[] $roles
     */
    public function __construct(
        Uuid $id,
        string $username,
        string $password,
        PasswordEncoder $passwordEncoder,
        array $roles
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $passwordEncoder->encodePassword($this, $password);
        $this->roles = $roles;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getSalt(): string
    {
        return 'salt';
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function changePassword(string $password, PasswordEncoder $passwordEncoder): void
    {
        $this->password = $passwordEncoder->encodePassword($this, $password);
    }
}