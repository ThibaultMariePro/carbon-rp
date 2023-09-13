<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230913084456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_sheet (id INT AUTO_INCREMENT NOT NULL, protagonist_id INT DEFAULT NULL, owner_id INT DEFAULT NULL, universe_id INT DEFAULT NULL, page_number INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_79FF7680CDF038AD (protagonist_id), INDEX IDX_79FF76807E3C61F9 (owner_id), INDEX IDX_79FF76805CD9AF2 (universe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_sheet_line (id INT AUTO_INCREMENT NOT NULL, line_key VARCHAR(255) NOT NULL, line_value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE character_sheet ADD CONSTRAINT FK_79FF7680CDF038AD FOREIGN KEY (protagonist_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE character_sheet ADD CONSTRAINT FK_79FF76807E3C61F9 FOREIGN KEY (owner_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE character_sheet ADD CONSTRAINT FK_79FF76805CD9AF2 FOREIGN KEY (universe_id) REFERENCES game (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_sheet DROP FOREIGN KEY FK_79FF7680CDF038AD');
        $this->addSql('ALTER TABLE character_sheet DROP FOREIGN KEY FK_79FF76807E3C61F9');
        $this->addSql('ALTER TABLE character_sheet DROP FOREIGN KEY FK_79FF76805CD9AF2');
        $this->addSql('DROP TABLE character_sheet');
        $this->addSql('DROP TABLE character_sheet_line');
    }
}
