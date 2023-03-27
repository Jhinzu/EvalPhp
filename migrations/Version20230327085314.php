<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230327085314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces ADD title VARCHAR(175) NOT NULL, ADD department VARCHAR(175) NOT NULL, DROP titre, DROP departement, CHANGE description container VARCHAR(255) DEFAULT NULL, CHANGE date_ajout date_add DATETIME NOT NULL, CHANGE prix price NUMERIC(10, 0) NOT NULL');
        $this->addSql('ALTER TABLE réponses CHANGE contenu container VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces ADD titre VARCHAR(175) NOT NULL, ADD departement VARCHAR(175) NOT NULL, DROP title, DROP department, CHANGE container description VARCHAR(255) DEFAULT NULL, CHANGE date_add date_ajout DATETIME NOT NULL, CHANGE price prix NUMERIC(10, 0) NOT NULL');
        $this->addSql('ALTER TABLE réponses CHANGE container contenu VARCHAR(255) NOT NULL');
    }
}
