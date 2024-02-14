<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240206181719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE newsletter ADD uuid VARCHAR(255) NOT NULL, ADD tags VARCHAR(255) DEFAULT NULL, ADD referenceImage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE newsletter ADD CONSTRAINT FK_7E8585C8B7EB03EE FOREIGN KEY (referenceImage_id) REFERENCES image (id)');
        $this->addSql('CREATE INDEX IDX_7E8585C8B7EB03EE ON newsletter (referenceImage_id)');
        $this->addSql('ALTER TABLE newsletter_category CHANGE uuid uuid VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE newsletter DROP FOREIGN KEY FK_7E8585C8B7EB03EE');
        $this->addSql('DROP INDEX IDX_7E8585C8B7EB03EE ON newsletter');
        $this->addSql('ALTER TABLE newsletter DROP uuid, DROP tags, DROP referenceImage_id');
        $this->addSql('ALTER TABLE newsletter_category CHANGE uuid uuid TINYINT(1) NOT NULL');
    }
}
