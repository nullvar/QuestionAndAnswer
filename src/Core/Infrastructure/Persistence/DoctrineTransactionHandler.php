<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Persistence;

use App\Core\Services\Persistence\TransactionHandler;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineTransactionHandler implements TransactionHandler
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function begin(): void
    {
        $this->entityManager->beginTransaction();
    }

    public function commit(): void
    {
        $this->entityManager->commit();
        $this->entityManager->flush();
        $this->clear();
    }

    public function rollback(): void
    {
        $this->clear();
        $this->entityManager->rollback();
    }

    public function clear(): void
    {
        if (!$this->entityManager->getConnection()->isTransactionActive()) {
            $this->entityManager->clear();
        }
    }
}