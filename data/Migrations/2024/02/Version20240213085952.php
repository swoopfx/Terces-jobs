<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240213085952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE help_page (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, descs LONGTEXT DEFAULT NULL, createdOn DATETIME DEFAULT NULL, updatedOn DATETIME DEFAULT NULL, INDEX IDX_518083BB12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE help_page_category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, uuid VARCHAR(255) NOT NULL, isActive TINYINT(1) DEFAULT 1 NOT NULL, UNIQUE INDEX UNIQ_70CDB178D17F50A6 (uuid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE help_page ADD CONSTRAINT FK_518083BB12469DE2 FOREIGN KEY (category_id) REFERENCES help_page_category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE help_page DROP FOREIGN KEY FK_518083BB12469DE2');
        $this->addSql('DROP TABLE help_page');
        $this->addSql('DROP TABLE help_page_category');
    }
}
