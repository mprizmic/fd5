<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413201524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carrera ADD oferta_id INT NOT NULL');
        $this->addSql('ALTER TABLE carrera ADD CONSTRAINT FK_41E9A8C0FAFBF624 FOREIGN KEY (oferta_id) REFERENCES oferta_educativa (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_41E9A8C0FAFBF624 ON carrera (oferta_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carrera DROP FOREIGN KEY FK_41E9A8C0FAFBF624');
        $this->addSql('DROP INDEX UNIQ_41E9A8C0FAFBF624 ON carrera');
        $this->addSql('ALTER TABLE carrera DROP oferta_id, CHANGE nombre nombre VARCHAR(150) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE duracion duracion VARCHAR(50) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE comentario comentario VARCHAR(250) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
