<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240303073149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job_apply_link_type (id INT AUTO_INCREMENT NOT NULL, apply_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE active_job_country ADD json VARCHAR(255) DEFAULT NULL, ADD flag VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE recruiter_job ADD createdOn DATETIME DEFAULT NULL, ADD external_link VARCHAR(255) NOT NULL, ADD applyLinkType_id INT DEFAULT NULL, CHANGE updatedOn updatedOn DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE recruiter_job ADD CONSTRAINT FK_7FCCF3A3C516CE52 FOREIGN KEY (applyLinkType_id) REFERENCES job_apply_link_type (id)');
        $this->addSql('CREATE INDEX IDX_7FCCF3A3C516CE52 ON recruiter_job (applyLinkType_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recruiter_job DROP FOREIGN KEY FK_7FCCF3A3C516CE52');
        $this->addSql('DROP TABLE job_apply_link_type');
        $this->addSql('ALTER TABLE active_job_country DROP json, DROP flag');
        $this->addSql('DROP INDEX IDX_7FCCF3A3C516CE52 ON recruiter_job');
        $this->addSql('ALTER TABLE recruiter_job DROP createdOn, DROP external_link, DROP applyLinkType_id, CHANGE updatedOn updatedOn DATETIME NOT NULL');
    }
}
