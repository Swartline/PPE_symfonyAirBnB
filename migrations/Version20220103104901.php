<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220103104901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rent (id INT AUTO_INCREMENT NOT NULL, tenant_id INT NOT NULL, residence_id INT NOT NULL, inventory_file VARCHAR(255) NOT NULL, arrival_date DATETIME NOT NULL, departure_date DATETIME NOT NULL, tenant_comments LONGTEXT NOT NULL, tenant_signature VARCHAR(255) NOT NULL, tenant_validated_at DATETIME NOT NULL, representative_comments LONGTEXT NOT NULL, representative_signature VARCHAR(255) NOT NULL, representative_validated_at DATETIME NOT NULL, INDEX IDX_2784DCC9033212A (tenant_id), INDEX IDX_2784DCC8B225FBD (residence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE residence (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, representative_id INT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip_code VARCHAR(45) NOT NULL, country VARCHAR(255) NOT NULL, inventory_file VARCHAR(255) NOT NULL, INDEX IDX_32758237E3C61F9 (owner_id), INDEX IDX_3275823FC3FF006 (representative_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) NOT NULL, email VARCHAR(45) NOT NULL, password VARCHAR(255) NOT NULL, is_verified SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC9033212A FOREIGN KEY (tenant_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE rent ADD CONSTRAINT FK_2784DCC8B225FBD FOREIGN KEY (residence_id) REFERENCES residence (id)');
        $this->addSql('ALTER TABLE residence ADD CONSTRAINT FK_32758237E3C61F9 FOREIGN KEY (owner_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE residence ADD CONSTRAINT FK_3275823FC3FF006 FOREIGN KEY (representative_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC8B225FBD');
        $this->addSql('ALTER TABLE rent DROP FOREIGN KEY FK_2784DCC9033212A');
        $this->addSql('ALTER TABLE residence DROP FOREIGN KEY FK_32758237E3C61F9');
        $this->addSql('ALTER TABLE residence DROP FOREIGN KEY FK_3275823FC3FF006');
        $this->addSql('DROP TABLE rent');
        $this->addSql('DROP TABLE residence');
        $this->addSql('DROP TABLE `user`');
    }
}
