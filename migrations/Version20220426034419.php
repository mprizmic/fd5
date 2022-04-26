<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220426034419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE oferta_educativa ADD primaria_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE oferta_educativa ADD CONSTRAINT FK_21B7C83139A446CC FOREIGN KEY (primaria_id) REFERENCES primaria (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_21B7C83139A446CC ON oferta_educativa (primaria_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE distrito_escolar CHANGE nombre nombre VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE establecimiento CHANGE cue cue VARCHAR(7) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE nombre nombre VARCHAR(80) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE descripcion descripcion VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE fecha_creacion fecha_creacion VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE tiene_cooperadora tiene_cooperadora VARCHAR(2) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE url url VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE apodo apodo VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE campo_deportes campo_deportes VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE oferta_educativa DROP FOREIGN KEY FK_21B7C83139A446CC');
        $this->addSql('DROP INDEX UNIQ_21B7C83139A446CC ON oferta_educativa');
        $this->addSql('ALTER TABLE oferta_educativa DROP primaria_id');
        $this->addSql('ALTER TABLE tipo_establecimiento CHANGE codigo codigo VARCHAR(5) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE descripcion descripcion VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
    }
}
