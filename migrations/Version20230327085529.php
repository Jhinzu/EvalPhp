<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230327085529 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE réponses DROP FOREIGN KEY FK_52CE2D9468C955C8');
        $this->addSql('DROP INDEX IDX_52CE2D9468C955C8 ON réponses');
        $this->addSql('ALTER TABLE réponses CHANGE annonce_id_id annonce_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE réponses ADD CONSTRAINT FK_52CE2D948805AB2F FOREIGN KEY (annonce_id) REFERENCES annonces (id)');
        $this->addSql('CREATE INDEX IDX_52CE2D948805AB2F ON réponses (annonce_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE réponses DROP FOREIGN KEY FK_52CE2D948805AB2F');
        $this->addSql('DROP INDEX IDX_52CE2D948805AB2F ON réponses');
        $this->addSql('ALTER TABLE réponses CHANGE annonce_id annonce_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE réponses ADD CONSTRAINT FK_52CE2D9468C955C8 FOREIGN KEY (annonce_id_id) REFERENCES annonces (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_52CE2D9468C955C8 ON réponses (annonce_id_id)');
    }
}
