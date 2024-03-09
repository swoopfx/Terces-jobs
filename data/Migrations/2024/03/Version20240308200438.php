<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240308200438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recruiter_job ADD uuid VARCHAR(255) NOT NULL, DROP otherJobtype');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7FCCF3A3D17F50A6 ON recruiter_job (uuid)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_7FCCF3A3D17F50A6 ON recruiter_job');
        $this->addSql('ALTER TABLE recruiter_job ADD otherJobtype VARCHAR(255) DEFAULT NULL, DROP uuid');
    }
}
