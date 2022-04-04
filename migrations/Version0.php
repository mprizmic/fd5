<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version0 extends AbstractMigration {

    public function getDescription(): string {
        return 'purga de la base de datos';
    }

    public function up(Schema $schema): void {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('delete from aviso');
        $this->addSql('delete from vecino');
        $this->addSql('delete from establecimiento_edificio');
        $this->addSql('delete from unidad_educativa');
        $this->addSql('delete from user');
        $this->addSql('delete from edificio');
        $this->addSql('delete from nivel');
        $this->addSql('delete from distrito_escolar');
        $this->addSql('delete from comuna');
        $this->addSql('delete from establecimiento');
        $this->addSql('delete from tipo_establecimiento');
    }

    public function down(Schema $schema): void {
        
    }

}
