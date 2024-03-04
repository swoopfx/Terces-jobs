<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240302153114 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE active_job_country (id INT AUTO_INCREMENT NOT NULL, country VARCHAR(255) NOT NULL, createdon DATETIME NOT NULL, updatedOn DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_skills (id INT AUTO_INCREMENT NOT NULL, skill VARCHAR(255) NOT NULL, associatedJob VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE other_post_job_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recruiter_blog (id INT AUTO_INCREMENT NOT NULL, uploader_id INT DEFAULT NULL, category_id INT DEFAULT NULL, uuid VARCHAR(255) NOT NULL, tags VARCHAR(255) DEFAULT NULL, titles LONGTEXT NOT NULL, contents LONGTEXT NOT NULL, is_published TINYINT(1) DEFAULT 0 NOT NULL, created_on DATETIME NOT NULL, referenceImage_id INT DEFAULT NULL, INDEX IDX_3C28CD2CB7EB03EE (referenceImage_id), INDEX IDX_3C28CD2C16678C77 (uploader_id), INDEX IDX_3C28CD2C12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recruiter_blog_category (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, uuid VARCHAR(255) NOT NULL, isActive TINYINT(1) DEFAULT 1 NOT NULL, createdOn DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recruiter_job (id INT AUTO_INCREMENT NOT NULL, poster_id INT DEFAULT NULL, job_title VARCHAR(255) NOT NULL, jobDescription LONGTEXT DEFAULT NULL, tags LONGTEXT DEFAULT NULL, isActive TINYINT(1) DEFAULT 0 NOT NULL, skills LONGTEXT DEFAULT NULL, updatedOn DATETIME NOT NULL, jobPosition_id INT DEFAULT NULL, jobType_id INT DEFAULT NULL, workplaceType_id INT DEFAULT NULL, associatedCompany_id INT DEFAULT NULL, INDEX IDX_7FCCF3A35BB66C05 (poster_id), INDEX IDX_7FCCF3A35224C1F4 (jobPosition_id), INDEX IDX_7FCCF3A3A3C67F0D (jobType_id), INDEX IDX_7FCCF3A3107007D8 (workplaceType_id), INDEX IDX_7FCCF3A32C4DC6DE (associatedCompany_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recruiter_job_position (id INT AUTO_INCREMENT NOT NULL, position VARCHAR(255) NOT NULL, uuid VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_35E846FED17F50A6 (uuid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recruiter_blog ADD CONSTRAINT FK_3C28CD2CB7EB03EE FOREIGN KEY (referenceImage_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE recruiter_blog ADD CONSTRAINT FK_3C28CD2C16678C77 FOREIGN KEY (uploader_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE recruiter_blog ADD CONSTRAINT FK_3C28CD2C12469DE2 FOREIGN KEY (category_id) REFERENCES recruiter_blog_category (id)');
        $this->addSql('ALTER TABLE recruiter_job ADD CONSTRAINT FK_7FCCF3A35BB66C05 FOREIGN KEY (poster_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE recruiter_job ADD CONSTRAINT FK_7FCCF3A35224C1F4 FOREIGN KEY (jobPosition_id) REFERENCES recruiter_job_position (id)');
        $this->addSql('ALTER TABLE recruiter_job ADD CONSTRAINT FK_7FCCF3A3A3C67F0D FOREIGN KEY (jobType_id) REFERENCES post_job_type (id)');
        $this->addSql('ALTER TABLE recruiter_job ADD CONSTRAINT FK_7FCCF3A3107007D8 FOREIGN KEY (workplaceType_id) REFERENCES post_job_workplace_type (id)');
        $this->addSql('ALTER TABLE recruiter_job ADD CONSTRAINT FK_7FCCF3A32C4DC6DE FOREIGN KEY (associatedCompany_id) REFERENCES recruiter_company (id)');
        $this->addSql('ALTER TABLE recruiter_profile ADD user_id INT DEFAULT NULL, ADD companyName VARCHAR(255) NOT NULL, ADD companyDescription LONGTEXT NOT NULL, ADD company_address LONGTEXT DEFAULT NULL, ADD company_email VARCHAR(255) DEFAULT NULL, ADD createdOn DATETIME NOT NULL, ADD updatedOn DATETIME NOT NULL');
        $this->addSql('ALTER TABLE recruiter_profile ADD CONSTRAINT FK_4740AFE9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4740AFE9A76ED395 ON recruiter_profile (user_id)');
        $this->addSql('ALTER TABLE user DROP companyName');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recruiter_blog DROP FOREIGN KEY FK_3C28CD2CB7EB03EE');
        $this->addSql('ALTER TABLE recruiter_blog DROP FOREIGN KEY FK_3C28CD2C16678C77');
        $this->addSql('ALTER TABLE recruiter_blog DROP FOREIGN KEY FK_3C28CD2C12469DE2');
        $this->addSql('ALTER TABLE recruiter_job DROP FOREIGN KEY FK_7FCCF3A35BB66C05');
        $this->addSql('ALTER TABLE recruiter_job DROP FOREIGN KEY FK_7FCCF3A35224C1F4');
        $this->addSql('ALTER TABLE recruiter_job DROP FOREIGN KEY FK_7FCCF3A3A3C67F0D');
        $this->addSql('ALTER TABLE recruiter_job DROP FOREIGN KEY FK_7FCCF3A3107007D8');
        $this->addSql('ALTER TABLE recruiter_job DROP FOREIGN KEY FK_7FCCF3A32C4DC6DE');
        $this->addSql('DROP TABLE active_job_country');
        $this->addSql('DROP TABLE job_skills');
        $this->addSql('DROP TABLE other_post_job_type');
        $this->addSql('DROP TABLE recruiter_blog');
        $this->addSql('DROP TABLE recruiter_blog_category');
        $this->addSql('DROP TABLE recruiter_job');
        $this->addSql('DROP TABLE recruiter_job_position');
        $this->addSql('ALTER TABLE recruiter_profile DROP FOREIGN KEY FK_4740AFE9A76ED395');
        $this->addSql('DROP INDEX IDX_4740AFE9A76ED395 ON recruiter_profile');
        $this->addSql('ALTER TABLE recruiter_profile DROP user_id, DROP companyName, DROP companyDescription, DROP company_address, DROP company_email, DROP createdOn, DROP updatedOn');
        $this->addSql('ALTER TABLE user ADD companyName VARCHAR(255) DEFAULT NULL');
    }
}
