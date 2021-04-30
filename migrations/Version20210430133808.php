<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210430133808 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql('ALTER TABLE users ALTER id TYPE uuid');
        $this->addSql('ALTER TABLE users ALTER id DROP DEFAULT');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_USERS_USERNAME ON users (username)');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX UNIQ_USERS_USERNAME');
        $this->addSql('ALTER TABLE users ALTER id TYPE UUID');
        $this->addSql('ALTER TABLE users ALTER id DROP DEFAULT');
    }
}
