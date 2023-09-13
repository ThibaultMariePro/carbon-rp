<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230913140915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_sheet_line ADD related_character_sheet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE character_sheet_line ADD CONSTRAINT FK_33E67D6D602AD2AD FOREIGN KEY (related_character_sheet_id) REFERENCES character_sheet (id)');
        $this->addSql('CREATE INDEX IDX_33E67D6D602AD2AD ON character_sheet_line (related_character_sheet_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_sheet_line DROP FOREIGN KEY FK_33E67D6D602AD2AD');
        $this->addSql('DROP INDEX IDX_33E67D6D602AD2AD ON character_sheet_line');
        $this->addSql('ALTER TABLE character_sheet_line DROP related_character_sheet_id');
    }
}
