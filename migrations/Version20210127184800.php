<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210127184800 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hiking (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, headers VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, duration VARCHAR(255) NOT NULL, length VARCHAR(255) NOT NULL, asc_elevation VARCHAR(255) NOT NULL, desc_elevation VARCHAR(255) NOT NULL, top_point VARCHAR(255) NOT NULL, bottom_point VARCHAR(255) NOT NULL, difficulty VARCHAR(255) NOT NULL, is_loop TINYINT(1) NOT NULL, way VARCHAR(255) NOT NULL, commune VARCHAR(255) NOT NULL, coordinates VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hiking_picture (id INT AUTO_INCREMENT NOT NULL, hiking_id INT NOT NULL, description VARCHAR(255) DEFAULT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_659DF1E671AFD0BB (hiking_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hiking_picture ADD CONSTRAINT FK_659DF1E671AFD0BB FOREIGN KEY (hiking_id) REFERENCES hiking (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hiking_picture DROP FOREIGN KEY FK_659DF1E671AFD0BB');
        $this->addSql('DROP TABLE hiking');
        $this->addSql('DROP TABLE hiking_picture');
    }
}
