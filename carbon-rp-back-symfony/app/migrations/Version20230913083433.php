<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230913083433 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, owner_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, INDEX IDX_937AB0347E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_player (game_id INT NOT NULL, player_id INT NOT NULL, INDEX IDX_E52CD7ADE48FD905 (game_id), INDEX IDX_E52CD7AD99E6F5DF (player_id), PRIMARY KEY(game_id, player_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, alias VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0347E3C61F9 FOREIGN KEY (owner_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE game_player ADD CONSTRAINT FK_E52CD7ADE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_player ADD CONSTRAINT FK_E52CD7AD99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0347E3C61F9');
        $this->addSql('ALTER TABLE game_player DROP FOREIGN KEY FK_E52CD7ADE48FD905');
        $this->addSql('ALTER TABLE game_player DROP FOREIGN KEY FK_E52CD7AD99E6F5DF');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE game_player');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
