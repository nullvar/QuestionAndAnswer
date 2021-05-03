<?php

declare(strict_types=1);

namespace App\Question\Infrastructure\Answer\Persistence;

use App\Question\Domain\Answer\Answer;
use App\Question\Domain\Answer\AnswerWriteStorage;
use Doctrine\ORM\EntityRepository;

class AnswerRepository extends EntityRepository implements AnswerWriteStorage
{
    /**
     * @throws \Doctrine\ORM\ORMException
     */
    public function add(Answer $answer): void
    {
        $this->getEntityManager()->persist($answer);
    }
}