<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220427104638 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredients DROP FOREIGN KEY FK_4B60114F59D8A214');
        $this->addSql('ALTER TABLE ingredients CHANGE recipe_id recipe_id INT NOT NULL');
        $this->addSql('ALTER TABLE ingredients ADD CONSTRAINT FK_4B60114F59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredients DROP FOREIGN KEY FK_4B60114F59D8A214');
        $this->addSql('ALTER TABLE ingredients CHANGE recipe_id recipe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingredients ADD CONSTRAINT FK_4B60114F59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
    }
}
