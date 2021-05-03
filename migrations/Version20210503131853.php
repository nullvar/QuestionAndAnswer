<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210503131853 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE questions_sequence_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE questions (
          sequence_id INT NOT NULL,
          id uuid NOT NULL,
          title VARCHAR(250) NOT NULL,
          content TEXT NOT NULL,
          created_at DATE NOT NULL,
          created_by uuid NOT NULL,
          PRIMARY KEY(sequence_id)
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_QUESTIONS_ID ON questions (id)');
        $this->addSql('COMMENT ON COLUMN questions.created_at IS \'(DC2Type:date_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP SEQUENCE questions_sequence_id_seq CASCADE');
        $this->addSql('DROP TABLE questions');
    }
}
