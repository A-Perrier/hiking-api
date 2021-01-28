<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210127201452 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hiking ADD commune_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hiking ADD CONSTRAINT FK_42CE0BD7131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
        $this->addSql('CREATE INDEX IDX_42CE0BD7131A4F72 ON hiking (commune_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hiking DROP FOREIGN KEY FK_42CE0BD7131A4F72');
        $this->addSql('DROP INDEX IDX_42CE0BD7131A4F72 ON hiking');
        $this->addSql('ALTER TABLE hiking DROP commune_id');
    }
}
