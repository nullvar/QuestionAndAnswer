<?php

declare(strict_types=1);

namespace App\Question\Infrastructure\Author\Persistence;

use App\Question\Domain\Author\Author;
use App\Question\Domain\Author\AuthorId;
use App\Question\Domain\Author\AuthorWriteStorage;
use Doctrine\ORM\EntityRepository;

class AuthorRepository extends EntityRepository implements AuthorWriteStorage
{
    public function getAndLock(AuthorId $id): ?Author
    {
        // TODO: Implement getAndLock() method.

        /** @var  null|Author $author */
        $author = $this->find((string) $id);

        return $author;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     */
    public function add(Author $author): void
    {
        $this->getEntityManager()->persist($author);
    }
}
