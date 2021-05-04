<?php

declare(strict_types=1);

namespace App\Question\Infrastructure\Tag\Persistence;

use App\Question\Domain\Tag\Tag;
use App\Question\Domain\Tag\TagWriteStorage;
use Doctrine\ORM\EntityRepository;

class TagRepository extends EntityRepository implements TagWriteStorage
{
    /**
     * @throws \Doctrine\ORM\ORMException
     */
    public function add(Tag $tag): void
    {
        $this->getEntityManager()->persist($tag);
    }
}