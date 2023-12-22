<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231222171335 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bitcoin (id_bitcoin INT AUTO_INCREMENT NOT NULL, symbol VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, currency VARCHAR(255) NOT NULL, base_currency VARCHAR(255) NOT NULL, PRIMARY KEY(id_bitcoin)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE debts CHANGE date date DATE NOT NULL, CHANGE description `describe` VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bitcoin');
        $this->addSql('ALTER TABLE debts CHANGE date date DATETIME DEFAULT NULL, CHANGE `describe` description VARCHAR(255) DEFAULT NULL');
    }
}
