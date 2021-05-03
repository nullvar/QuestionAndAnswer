<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210503213910 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answers (
          id uuid NOT NULL,
          content TEXT NOT NULL,
          belongs_to uuid NOT NULL,
          created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
          created_by uuid NOT NULL,
          PRIMARY KEY(id)
        )');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE answers');
    }
}
