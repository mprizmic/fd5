<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220331191548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE edificio CHANGE slug slug VARCHAR(255) NOT NULL');
//        $this->addSql('ALTER TABLE establecimiento CHANGE slug slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE unidad_educativa ADD establecimiento_id INT NOT NULL, ADD nivel_id INT NOT NULL');
        $this->addSql('ALTER TABLE unidad_educativa ADD CONSTRAINT FK_27515E8071B61351 FOREIGN KEY (establecimiento_id) REFERENCES establecimiento (id)');
        $this->addSql('ALTER TABLE unidad_educativa ADD CONSTRAINT FK_27515E80DA3426AE FOREIGN KEY (nivel_id) REFERENCES nivel (id)');
        $this->addSql('CREATE INDEX IDX_27515E8071B61351 ON unidad_educativa (establecimiento_id)');
        $this->addSql('CREATE INDEX IDX_27515E80DA3426AE ON unidad_educativa (nivel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aviso CHANGE descripcion descripcion VARCHAR(250) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE distrito_escolar CHANGE nombre nombre VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE edificio CHANGE referencia referencia VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE establecimiento CHANGE cue cue VARCHAR(7) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE nombre nombre VARCHAR(80) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE descripcion descripcion VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE fecha_creacion fecha_creacion VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE tiene_cooperadora tiene_cooperadora VARCHAR(2) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE url url VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE apodo apodo VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE campo_deportes campo_deportes VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE slug slug VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE nivel CHANGE nombre nombre VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE abreviatura abreviatura VARCHAR(5) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tipo_establecimiento CHANGE codigo codigo VARCHAR(5) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE descripcion descripcion VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE unidad_educativa DROP FOREIGN KEY FK_27515E8071B61351');
        $this->addSql('ALTER TABLE unidad_educativa DROP FOREIGN KEY FK_27515E80DA3426AE');
        $this->addSql('DROP INDEX IDX_27515E8071B61351 ON unidad_educativa');
        $this->addSql('DROP INDEX IDX_27515E80DA3426AE ON unidad_educativa');
        $this->addSql('ALTER TABLE unidad_educativa DROP establecimiento_id, DROP nivel_id, CHANGE descripcion descripcion VARCHAR(30) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
