<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220221203630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE distrito_escolar CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE establecimiento ADD distrito_escolar_id INT NOT NULL');
        $this->addSql('ALTER TABLE establecimiento ADD CONSTRAINT FK_94A4D17E62E97D21 FOREIGN KEY (distrito_escolar_id) REFERENCES distrito_escolar (id)');
        $this->addSql('CREATE INDEX IDX_94A4D17E62E97D21 ON establecimiento (distrito_escolar_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE distrito_escolar CHANGE id id INT NOT NULL, CHANGE nombre nombre VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE establecimiento DROP FOREIGN KEY FK_94A4D17E62E97D21');
        $this->addSql('DROP INDEX IDX_94A4D17E62E97D21 ON establecimiento');
        $this->addSql('ALTER TABLE establecimiento DROP distrito_escolar_id, CHANGE cue cue VARCHAR(7) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE nombre nombre VARCHAR(80) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE descripcion descripcion VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE fecha_creacion fecha_creacion VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE tiene_cooperadora tiene_cooperadora VARCHAR(2) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE url url VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE apodo apodo VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE campo_deportes campo_deportes VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
    }
}
