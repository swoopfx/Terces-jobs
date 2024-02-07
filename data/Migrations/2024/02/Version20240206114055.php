<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240206114055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country_location (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, uploader_id INT DEFAULT NULL, category_id INT DEFAULT NULL, titles LONGTEXT NOT NULL, contents LONGTEXT NOT NULL, is_published TINYINT(1) DEFAULT 0 NOT NULL, created_on DATETIME NOT NULL, INDEX IDX_7E8585C816678C77 (uploader_id), INDEX IDX_7E8585C812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter_category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, uuid TINYINT(1) NOT NULL, isActive TINYINT(1) DEFAULT 1 NOT NULL, createdOn DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_job_type (id INT AUTO_INCREMENT NOT NULL, post_job_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_job_workplace_type (id INT AUTO_INCREMENT NOT NULL, workplace_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE postjob_counter (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, counter INT DEFAULT 0 NOT NULL, created_on DATETIME NOT NULL, updated_on DATETIME NOT NULL, INDEX IDX_1BFEDA5AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE privilege (id INT AUTO_INCREMENT NOT NULL, resource_id INT DEFAULT NULL, role_id INT NOT NULL, name VARCHAR(100) DEFAULT NULL, permission_allow TINYINT(1) NOT NULL, INDEX IDX_87209A8789329D25 (resource_id), INDEX IDX_87209A87D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recruiter_company (id INT AUTO_INCREMENT NOT NULL, company_name VARCHAR(255) NOT NULL, company_address LONGTEXT DEFAULT NULL, company_description LONGTEXT DEFAULT NULL, company_email VARCHAR(255) DEFAULT NULL, recruiterProfile_id INT DEFAULT NULL, INDEX IDX_89A80CA9B675D687 (recruiterProfile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recruiter_profile (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resource (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_BC91F4165E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE newsletter ADD CONSTRAINT FK_7E8585C816678C77 FOREIGN KEY (uploader_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE newsletter ADD CONSTRAINT FK_7E8585C812469DE2 FOREIGN KEY (category_id) REFERENCES newsletter_category (id)');
        $this->addSql('ALTER TABLE postjob_counter ADD CONSTRAINT FK_1BFEDA5AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE privilege ADD CONSTRAINT FK_87209A8789329D25 FOREIGN KEY (resource_id) REFERENCES resource (id)');
        $this->addSql('ALTER TABLE privilege ADD CONSTRAINT FK_87209A87D60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE recruiter_company ADD CONSTRAINT FK_89A80CA9B675D687 FOREIGN KEY (recruiterProfile_id) REFERENCES recruiter_profile (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE newsletter DROP FOREIGN KEY FK_7E8585C816678C77');
        $this->addSql('ALTER TABLE newsletter DROP FOREIGN KEY FK_7E8585C812469DE2');
        $this->addSql('ALTER TABLE postjob_counter DROP FOREIGN KEY FK_1BFEDA5AA76ED395');
        $this->addSql('ALTER TABLE privilege DROP FOREIGN KEY FK_87209A8789329D25');
        $this->addSql('ALTER TABLE privilege DROP FOREIGN KEY FK_87209A87D60322AC');
        $this->addSql('ALTER TABLE recruiter_company DROP FOREIGN KEY FK_89A80CA9B675D687');
        $this->addSql('DROP TABLE country_location');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE newsletter_category');
        $this->addSql('DROP TABLE post_job_type');
        $this->addSql('DROP TABLE post_job_workplace_type');
        $this->addSql('DROP TABLE postjob_counter');
        $this->addSql('DROP TABLE privilege');
        $this->addSql('DROP TABLE recruiter_company');
        $this->addSql('DROP TABLE recruiter_profile');
        $this->addSql('DROP TABLE resource');
    }
}
