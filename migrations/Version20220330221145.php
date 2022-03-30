<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220330221145 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE edificio ADD comuna_id INT DEFAULT NULL, DROP comuna, CHANGE slug slug VARCHAR(255)');
        $this->addSql('ALTER TABLE edificio ADD CONSTRAINT FK_DED4A4E873AEFE7 FOREIGN KEY (comuna_id) REFERENCES comuna (id)');
        $this->addSql('CREATE INDEX IDX_DED4A4E873AEFE7 ON edificio (comuna_id)');
        $this->addSql('ALTER TABLE establecimiento CHANGE slug slug VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aviso CHANGE descripcion descripcion VARCHAR(250) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE distrito_escolar CHANGE nombre nombre VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE edificio DROP FOREIGN KEY FK_DED4A4E873AEFE7');
        $this->addSql('DROP INDEX IDX_DED4A4E873AEFE7 ON edificio');
        $this->addSql('ALTER TABLE edificio ADD comuna BIGINT DEFAULT NULL, DROP comuna_id, CHANGE referencia referencia VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE slug slug VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE establecimiento CHANGE cue cue VARCHAR(7) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE nombre nombre VARCHAR(80) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE descripcion descripcion VARCHAR(15) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE fecha_creacion fecha_creacion VARCHAR(10) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE tiene_cooperadora tiene_cooperadora VARCHAR(2) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE url url VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE apodo apodo VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE campo_deportes campo_deportes VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE slug slug VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tipo_establecimiento CHANGE codigo codigo VARCHAR(5) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE descripcion descripcion VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
