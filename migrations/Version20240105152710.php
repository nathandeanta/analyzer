<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240105152710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE wallet (id_wallet INT AUTO_INCREMENT NOT NULL, id_bitcoin INT DEFAULT NULL, exchange VARCHAR(255) NOT NULL, date DATETIME DEFAULT NULL, INDEX IDX_7C68921F85C7B1E (id_bitcoin), PRIMARY KEY(id_wallet)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wallet ADD CONSTRAINT FK_7C68921F85C7B1E FOREIGN KEY (id_bitcoin) REFERENCES bitcoin (id_bitcoin)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wallet DROP FOREIGN KEY FK_7C68921F85C7B1E');
        $this->addSql('DROP TABLE wallet');
    }
}
