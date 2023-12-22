<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231222185751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ticker (id_ticker INT AUTO_INCREMENT NOT NULL, id_bitcoin INT DEFAULT NULL, buy VARCHAR(255) NOT NULL, high VARCHAR(255) NOT NULL, last VARCHAR(255) NOT NULL, low VARCHAR(255) NOT NULL, open VARCHAR(255) NOT NULL, pair VARCHAR(255) NOT NULL, sell VARCHAR(255) NOT NULL, vol VARCHAR(255) NOT NULL, date INT NOT NULL, date_real DATETIME NOT NULL, INDEX IDX_7EC3089685C7B1E (id_bitcoin), PRIMARY KEY(id_ticker)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ticker ADD CONSTRAINT FK_7EC3089685C7B1E FOREIGN KEY (id_bitcoin) REFERENCES bitcoin (id_bitcoin)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticker DROP FOREIGN KEY FK_7EC3089685C7B1E');
        $this->addSql('DROP TABLE ticker');
    }
}
