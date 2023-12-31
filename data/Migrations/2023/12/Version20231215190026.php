<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231215190026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, image_uid VARCHAR(255) DEFAULT NULL, image_url LONGTEXT DEFAULT NULL, low_resolution VARCHAR(255) DEFAULT NULL, thumbnail VARCHAR(255) DEFAULT NULL, image_name VARCHAR(200) DEFAULT NULL, is_hidden TINYINT(1) DEFAULT NULL, mime_type TINYTEXT DEFAULT NULL, image_ext TINYTEXT DEFAULT NULL, created_on DATETIME DEFAULT NULL, updated_on DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jwt (id INT AUTO_INCREMENT NOT NULL, signKey LONGTEXT NOT NULL, refreshKey LONGTEXT NOT NULL, verifyKkey LONGTEXT NOT NULL, issuer VARCHAR(255) NOT NULL, aud VARCHAR(100) NOT NULL, secretKeyExpires VARCHAR(100) NOT NULL, refreshKeyExpires VARCHAR(100) NOT NULL, createdOn DATETIME NOT NULL, updatedOn DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE o_auth_provider (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, dropPage VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles_parents (role_id INT NOT NULL, parent_id INT NOT NULL, INDEX IDX_C70E6B91D60322AC (role_id), INDEX IDX_C70E6B91727ACA70 (parent_id), PRIMARY KEY(role_id, parent_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE security_question (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE settings (id INT AUTO_INCREMENT NOT NULL, flutterwavePublicKey LONGTEXT NOT NULL, flutterwaveSecretKey LONGTEXT NOT NULL, flutterwaveEncKey LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT DEFAULT NULL, state_id INT DEFAULT NULL, question_id INT DEFAULT NULL, fullname VARCHAR(255) DEFAULT NULL, username VARCHAR(30) NOT NULL, email VARCHAR(30) NOT NULL, password VARCHAR(100) NOT NULL, answer VARCHAR(255) DEFAULT NULL, registration_date DATETIME DEFAULT NULL, registration_token VARCHAR(200) DEFAULT NULL, email_confirmed TINYINT(1) NOT NULL, is_profiled TINYINT(1) DEFAULT NULL, uid VARCHAR(255) NOT NULL, uuid VARCHAR(255) NOT NULL, mobileActivateCode VARCHAR(255) DEFAULT NULL, isOauth TINYINT(1) DEFAULT 0 NOT NULL, oauthUid VARCHAR(255) NOT NULL, oauthProvider_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D6497C90B64A (oauthUid), INDEX IDX_8D93D649D60322AC (role_id), INDEX IDX_8D93D6495D83CC1 (state_id), INDEX IDX_8D93D6491E27F6BF (question_id), INDEX IDX_8D93D6497D4278BE (oauthProvider_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_refresh_token (id INT AUTO_INCREMENT NOT NULL, refreshToken LONGTEXT NOT NULL, userAgent VARCHAR(255) DEFAULT NULL, tokenId VARCHAR(255) NOT NULL, userIp VARCHAR(255) DEFAULT NULL, createdOn DATETIME NOT NULL, expiresOn DATETIME NOT NULL, uuid VARCHAR(255) DEFAULT NULL, refreshUid VARCHAR(255) NOT NULL, userId_id INT DEFAULT NULL, INDEX IDX_29C18CC599218D81 (userId_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_state (id INT AUTO_INCREMENT NOT NULL, state VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE roles_parents ADD CONSTRAINT FK_C70E6B91D60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE roles_parents ADD CONSTRAINT FK_C70E6B91727ACA70 FOREIGN KEY (parent_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES roles (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495D83CC1 FOREIGN KEY (state_id) REFERENCES user_state (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491E27F6BF FOREIGN KEY (question_id) REFERENCES security_question (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497D4278BE FOREIGN KEY (oauthProvider_id) REFERENCES o_auth_provider (id)');
        $this->addSql('ALTER TABLE user_refresh_token ADD CONSTRAINT FK_29C18CC599218D81 FOREIGN KEY (userId_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE roles_parents DROP FOREIGN KEY FK_C70E6B91D60322AC');
        $this->addSql('ALTER TABLE roles_parents DROP FOREIGN KEY FK_C70E6B91727ACA70');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495D83CC1');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6491E27F6BF');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497D4278BE');
        $this->addSql('ALTER TABLE user_refresh_token DROP FOREIGN KEY FK_29C18CC599218D81');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE jwt');
        $this->addSql('DROP TABLE o_auth_provider');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE roles_parents');
        $this->addSql('DROP TABLE security_question');
        $this->addSql('DROP TABLE settings');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_refresh_token');
        $this->addSql('DROP TABLE user_state');
    }
}
