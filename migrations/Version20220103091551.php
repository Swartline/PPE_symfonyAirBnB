<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220103091551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rent (id INT AUTO_INCREMENT NOT NULL, inventory_file VARCHAR(255) NOT NULL, arrival_date DATETIME NOT NULL, departure_date DATETIME NOT NULL, tenant_comments LONGTEXT NOT NULL, tenant_signature VARCHAR(255) NOT NULL, tenant_validated_at DATETIME NOT NULL, representative_comments LONGTEXT NOT NULL, representative_signature VARCHAR(255) NOT NULL, representative_validated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE residence (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip_code VARCHAR(45) NOT NULL, country VARCHAR(255) NOT NULL, inventory_file VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) NOT NULL, email VARCHAR(45) NOT NULL, password VARCHAR(255) NOT NULL, is_verified SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rent');
        $this->addSql('DROP TABLE residence');
        $this->addSql('DROP TABLE `user`');
    }
}
