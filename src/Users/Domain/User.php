<?php

declare(strict_types=1);

namespace App\Users\Domain;

use Symfony\Component\Uid\Uuid;

class User
{
    private Uuid $id;
    private string $login;
    private string $password;

    public function __construct(Uuid $id, string $login, string $password)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}