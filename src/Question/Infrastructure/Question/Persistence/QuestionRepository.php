<?php

declare(strict_types=1);

namespace App\Question\Infrastructure\Question\Persistence;

use App\Question\Domain\Question\Question;
use App\Question\Domain\Question\QuestionWriteStorage;
use Doctrine\ORM\EntityRepository;

class QuestionRepository extends EntityRepository implements QuestionWriteStorage
{
    public function add(Question $question): void
    {
        $this->getEntityManager()->persist($question);
    }
}