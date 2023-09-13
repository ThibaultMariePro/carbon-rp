<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230913140546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inventory (id INT AUTO_INCREMENT NOT NULL, max_size INT DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inventory_character (inventory_id INT NOT NULL, character_id INT NOT NULL, INDEX IDX_14C6595C9EEA759 (inventory_id), INDEX IDX_14C6595C1136BE75 (character_id), PRIMARY KEY(inventory_id, character_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, location_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_1F1B251E64D218E (location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_property (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_property_item (item_property_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_ECAF32FFB4FA4BDA (item_property_id), INDEX IDX_ECAF32FF126F525E (item_id), PRIMARY KEY(item_property_id, item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inventory_character ADD CONSTRAINT FK_14C6595C9EEA759 FOREIGN KEY (inventory_id) REFERENCES inventory (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inventory_character ADD CONSTRAINT FK_14C6595C1136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E64D218E FOREIGN KEY (location_id) REFERENCES inventory (id)');
        $this->addSql('ALTER TABLE item_property_item ADD CONSTRAINT FK_ECAF32FFB4FA4BDA FOREIGN KEY (item_property_id) REFERENCES item_property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_property_item ADD CONSTRAINT FK_ECAF32FF126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inventory_character DROP FOREIGN KEY FK_14C6595C9EEA759');
        $this->addSql('ALTER TABLE inventory_character DROP FOREIGN KEY FK_14C6595C1136BE75');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E64D218E');
        $this->addSql('ALTER TABLE item_property_item DROP FOREIGN KEY FK_ECAF32FFB4FA4BDA');
        $this->addSql('ALTER TABLE item_property_item DROP FOREIGN KEY FK_ECAF32FF126F525E');
        $this->addSql('DROP TABLE inventory');
        $this->addSql('DROP TABLE inventory_character');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_property');
        $this->addSql('DROP TABLE item_property_item');
    }
}
