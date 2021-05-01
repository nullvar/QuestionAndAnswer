<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210501001800 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE profiles (
          id uuid NOT NULL,
          name VARCHAR(50) NOT NULL,
          user_id uuid NOT NULL,
          PRIMARY KEY(id)
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_PROFILES_NAME ON profiles (name)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE profiles');
    }
}
