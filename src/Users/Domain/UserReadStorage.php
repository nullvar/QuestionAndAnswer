<?php

declare(strict_types=1);

namespace App\Users\Domain;

use Symfony\Component\Uid\Uuid;

interface UserReadStorage
{
    public function getById(Uuid $id): ?User;
}