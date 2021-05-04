<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210504113253 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answers (
          id uuid NOT NULL,
          content TEXT NOT NULL,
          question_id uuid NOT NULL,
          created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
          author_id uuid NOT NULL,
          PRIMARY KEY(id)
        )');
        $this->addSql('COMMENT ON COLUMN answers.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE authors (
          id uuid NOT NULL,
          name VARCHAR(50) NOT NULL,
          user_id uuid NOT NULL,
          PRIMARY KEY(id)
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8E0C2A515E237E06 ON authors (name)');
        $this->addSql('CREATE TABLE questions (
          sequence_id INT NOT NULL,
          id uuid NOT NULL,
          title VARCHAR(250) NOT NULL,
          content TEXT NOT NULL,
          created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
          author_id uuid NOT NULL,
          PRIMARY KEY(sequence_id)
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8ADC54D5BF396750 ON questions (id)');
        $this->addSql('COMMENT ON COLUMN questions.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE users (
          id uuid NOT NULL,
          username VARCHAR(100) NOT NULL,
          password VARCHAR(255) NOT NULL,
          PRIMARY KEY(id)
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9F85E0677 ON users (username)');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE answers');
        $this->addSql('DROP TABLE authors');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE users');
    }
}
