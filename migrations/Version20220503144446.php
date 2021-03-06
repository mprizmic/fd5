<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220503144446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE localizacion_oeturno (id INT AUTO_INCREMENT NOT NULL, turno_id INT NOT NULL, localizacion_oe_id INT NOT NULL, INDEX IDX_2B84754E69C5211E (turno_id), INDEX IDX_2B84754ED97B1FE3 (localizacion_oe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE turno (id INT AUTO_INCREMENT NOT NULL, codigo VARCHAR(2) NOT NULL, descripcion VARCHAR(50) NOT NULL, orden INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE localizacion_oeturno ADD CONSTRAINT FK_2B84754E69C5211E FOREIGN KEY (turno_id) REFERENCES turno (id)');
        $this->addSql('ALTER TABLE localizacion_oeturno ADD CONSTRAINT FK_2B84754ED97B1FE3 FOREIGN KEY (localizacion_oe_id) REFERENCES localizacion_oe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE localizacion_oeturno DROP FOREIGN KEY FK_2B84754E69C5211E');
        $this->addSql('DROP TABLE localizacion_oeturno');
        $this->addSql('DROP TABLE turno');
        $this->addSql('ALTER TABLE area CHANGE codigo codigo VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE descripcion descripcion VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE aviso CHANGE descripcion descripcion VARCHAR(250) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE barrio CHANGE nombre nombre VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE abreviatura abreviatura VARCHAR(5) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE carrera CHANGE nombre nombre VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE duracion duracion VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE comentario comentario VARCHAR(250) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE ciclo_pedagogico CHANGE nombre nombre VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE titulo titulo VARCHAR(200) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE duracion duracion VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE distrito_escolar CHANGE nombre nombre VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE domicilio CHANGE calle calle VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE altura altura VARCHAR(5) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE c_postal c_postal VARCHAR(8) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE edificio CHANGE referencia referencia VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE especializacion CHANGE nombre nombre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE duracion duracion VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE titulo titulo VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE establecimiento CHANGE cue cue VARCHAR(7) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE nombre nombre VARCHAR(80) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE descripcion descripcion VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE fecha_creacion fecha_creacion VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE tiene_cooperadora tiene_cooperadora VARCHAR(2) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE url url VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE apodo apodo VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE campo_deportes campo_deportes VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE slug slug VARCHAR(255) NOT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE establecimiento_edificio CHANGE cue_anexo cue_anexo VARCHAR(2) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nombre nombre VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE te te VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE referente_sga referente_sga VARCHAR(200) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE inicial CHANGE nombre nombre VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE duracion duracion VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE localizacion_oe CHANGE examen_ingreso examen_ingreso VARCHAR(3) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nivel CHANGE nombre nombre VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE abreviatura abreviatura VARCHAR(5) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE primaria CHANGE duracion duracion VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE descripcion descripcion VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE sdf CHANGE nombre nombre VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE titulo titulo VARCHAR(150) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE duracion duracion VARCHAR(15) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tipo_establecimiento CHANGE codigo codigo VARCHAR(5) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE descripcion descripcion VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tipo_formacion CHANGE codigo codigo VARCHAR(2) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE descripcion descripcion VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tipo_oferta_educativa CHANGE codigo codigo VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE descripcion descripcion VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE unidad_educativa CHANGE descripcion descripcion VARCHAR(30) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE vecino CHANGE nombre nombre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
