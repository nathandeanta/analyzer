<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231214121851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE user (id_user INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, position VARCHAR(255) DEFAULT NULL, admin INT NOT NULL, active INT NOT NULL, PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_flow (id_type_flow INT AUTO_INCREMENT NOT NULL, id_user INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_85CF13786B3CA4B (id_user), PRIMARY KEY(id_type_flow)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cash_flow (id_cash_flow INT AUTO_INCREMENT NOT NULL, id_type_flow INT DEFAULT NULL, value NUMERIC(10, 2) NOT NULL, description LONGTEXT DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, type_transactiion VARCHAR(255) DEFAULT NULL, bank VARCHAR(255) DEFAULT NULL, currency VARCHAR(255) DEFAULT NULL, currency_to VARCHAR(255) DEFAULT NULL, current_convert NUMERIC(10, 2) DEFAULT NULL, merchant VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_6F461F1D5FAAF5F (id_type_flow), PRIMARY KEY(id_cash_flow)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE debts (
    `id_debts` INT AUTO_INCREMENT NOT NULL,
    `id_user` INT DEFAULT NULL,
    `id_type_flow` INT DEFAULT NULL,
    `description` VARCHAR(255) DEFAULT NULL,
    `ui_generate` VARCHAR(255) DEFAULT NULL,
    `service` VARCHAR(255) DEFAULT NULL,
    `amount` NUMERIC(10, 2) NOT NULL,
    `total` NUMERIC(10, 2) DEFAULT NULL,
    `portion` INT DEFAULT NULL,
    `number_of_installments` INT DEFAULT NULL,
    `date` DATETIME DEFAULT NULL,
    `created_at` DATETIME NOT NULL,
    INDEX `IDX_6F64A29B6B3CA4B` (`id_user`),
    INDEX `IDX_6F64A29B5FAAF5F` (`id_type_flow`),
    PRIMARY KEY (`id_debts`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
');


        $this->addSql('CREATE TABLE investment_entity (id_investment INT AUTO_INCREMENT NOT NULL, amount NUMERIC(10, 2) NOT NULL, tax NUMERIC(10, 2) NOT NULL, bank VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id_investment)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE total (id_total INT AUTO_INCREMENT NOT NULL, amount NUMERIC(10, 2) NOT NULL, service VARCHAR(255) DEFAULT NULL, date DATETIME DEFAULT NULL, PRIMARY KEY(id_total)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');


        $this->addSql('ALTER TABLE cash_flow ADD CONSTRAINT FK_6F461F1D5FAAF5F FOREIGN KEY (id_type_flow) REFERENCES type_flow (id_type_flow)');
        $this->addSql('ALTER TABLE debts ADD CONSTRAINT FK_6F64A29B6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE debts ADD CONSTRAINT FK_6F64A29B5FAAF5F FOREIGN KEY (id_type_flow) REFERENCES type_flow (id_type_flow)');
        $this->addSql('ALTER TABLE type_flow ADD CONSTRAINT FK_85CF13786B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cash_flow DROP FOREIGN KEY FK_6F461F1D5FAAF5F');
        $this->addSql('ALTER TABLE debts DROP FOREIGN KEY FK_6F64A29B6B3CA4B');
        $this->addSql('ALTER TABLE debts DROP FOREIGN KEY FK_6F64A29B5FAAF5F');
        $this->addSql('ALTER TABLE type_flow DROP FOREIGN KEY FK_85CF13786B3CA4B');
        $this->addSql('DROP TABLE cash_flow');
        $this->addSql('DROP TABLE debts');
        $this->addSql('DROP TABLE investment_entity');
        $this->addSql('DROP TABLE total');
        $this->addSql('DROP TABLE type_flow');
        $this->addSql('DROP TABLE user');
    }
}
