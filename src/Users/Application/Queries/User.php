<?php

declare(strict_types=1);

namespace App\Users\Application\Queries;

use Symfony\Component\Uid\Uuid;

interface User
{
    public function getId(): string;
    public function getLogin(): string;
    public function getPassword(): string;
}