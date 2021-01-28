<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210127193049 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX ville_departement ON commune');
        $this->addSql('DROP INDEX ville_code_postal ON commune');
        $this->addSql('DROP INDEX ville_slug ON commune');
        $this->addSql('DROP INDEX ville_nom_reel ON commune');
        $this->addSql('ALTER TABLE commune CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE departement departement VARCHAR(255) NOT NULL, CHANGE slug slug VARCHAR(255) NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE code_postal code_postal VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commune CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE departement departement VARCHAR(3) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE slug slug VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE nom nom VARCHAR(45) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE code_postal code_postal VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('CREATE INDEX ville_departement ON commune (departement)');
        $this->addSql('CREATE INDEX ville_code_postal ON commune (code_postal)');
        $this->addSql('CREATE UNIQUE INDEX ville_slug ON commune (slug)');
        $this->addSql('CREATE INDEX ville_nom_reel ON commune (nom)');
    }
}
