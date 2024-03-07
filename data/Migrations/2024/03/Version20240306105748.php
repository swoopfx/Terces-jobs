<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240306105748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE active_job_country CHANGE json json LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE recruiter_job ADD country_id INT DEFAULT NULL, ADD marketing_id INT DEFAULT NULL, ADD otherMarketing VARCHAR(255) DEFAULT NULL, ADD otherJobtype VARCHAR(255) DEFAULT NULL, ADD filterQuestions LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE recruiter_job ADD CONSTRAINT FK_7FCCF3A3F92F3E70 FOREIGN KEY (country_id) REFERENCES active_job_country (id)');
        $this->addSql('ALTER TABLE recruiter_job ADD CONSTRAINT FK_7FCCF3A3C6DCB66C FOREIGN KEY (marketing_id) REFERENCES marketing (id)');
        $this->addSql('CREATE INDEX IDX_7FCCF3A3F92F3E70 ON recruiter_job (country_id)');
        $this->addSql('CREATE INDEX IDX_7FCCF3A3C6DCB66C ON recruiter_job (marketing_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE active_job_country CHANGE json json VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE recruiter_job DROP FOREIGN KEY FK_7FCCF3A3F92F3E70');
        $this->addSql('ALTER TABLE recruiter_job DROP FOREIGN KEY FK_7FCCF3A3C6DCB66C');
        $this->addSql('DROP INDEX IDX_7FCCF3A3F92F3E70 ON recruiter_job');
        $this->addSql('DROP INDEX IDX_7FCCF3A3C6DCB66C ON recruiter_job');
        $this->addSql('ALTER TABLE recruiter_job DROP country_id, DROP marketing_id, DROP otherMarketing, DROP otherJobtype, DROP filterQuestions');
    }
}
