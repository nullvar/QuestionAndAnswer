<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210503154226 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE questions (
          sequence_id INT NOT NULL,
          id uuid NOT NULL,
          title VARCHAR(250) NOT NULL,
          content TEXT NOT NULL,
          created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
          created_by uuid NOT NULL,
          PRIMARY KEY(sequence_id)
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_QUESTIONS_ID ON questions (id)');
        $this->addSql('COMMENT ON COLUMN questions.created_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE questions');
    }
}
