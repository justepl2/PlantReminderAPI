<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211221005944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'First migration, Add Plant table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plant (id INT UNSIGNED AUTO_INCREMENT NOT NULL, uuid VARCHAR(255) NOT NULL, specie VARCHAR(255) NOT NULL, nickname VARCHAR(255) DEFAULT NULL, water_evry INT NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE plant');
    }
}
