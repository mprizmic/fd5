<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220405145605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE domicilio ADD edificio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE domicilio ADD CONSTRAINT FK_9B942ED18A652BD6 FOREIGN KEY (edificio_id) REFERENCES edificio (id)');
        $this->addSql('CREATE INDEX IDX_9B942ED18A652BD6 ON domicilio (edificio_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE area CHANGE codigo codigo VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE descripcion descripcion VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE aviso CHANGE descripcion descripcion VARCHAR(250) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE distrito_escolar CHANGE nombre nombre VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE domicilio DROP FOREIGN KEY FK_9B942ED18A652BD6');
        $this->addSql('DROP INDEX IDX_9B942ED18A652BD6 ON domicilio');
        $this->addSql('ALTER TABLE domicilio DROP edificio_id, CHANGE calle calle VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE altura altura VARCHAR(5) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE c_postal c_postal VARCHAR(8) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE edificio CHANGE referencia referencia VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE establecimiento CHANGE cue cue VARCHAR(7) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE nombre nombre VARCHAR(80) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE descripcion descripcion VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE fecha_creacion fecha_creacion VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE tiene_cooperadora tiene_cooperadora VARCHAR(2) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE url url VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE apodo apodo VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE campo_deportes campo_deportes VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE establecimiento_edificio CHANGE cue_anexo cue_anexo VARCHAR(2) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nombre nombre VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE te te VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE referente_sga referente_sga VARCHAR(200) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nivel CHANGE nombre nombre VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE abreviatura abreviatura VARCHAR(5) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tipo_establecimiento CHANGE codigo codigo VARCHAR(5) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE descripcion descripcion VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE unidad_educativa CHANGE descripcion descripcion VARCHAR(30) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE vecino CHANGE nombre nombre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
