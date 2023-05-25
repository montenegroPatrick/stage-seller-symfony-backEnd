<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411174444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stage_skill (stage_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_DE9A56B32298D193 (stage_id), INDEX IDX_DE9A56B35585C142 (skill_id), PRIMARY KEY(stage_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stage_skill ADD CONSTRAINT FK_DE9A56B32298D193 FOREIGN KEY (stage_id) REFERENCES stage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_skill ADD CONSTRAINT FK_DE9A56B35585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stage_skill DROP FOREIGN KEY FK_DE9A56B32298D193');
        $this->addSql('ALTER TABLE stage_skill DROP FOREIGN KEY FK_DE9A56B35585C142');
        $this->addSql('DROP TABLE stage_skill');
    }
}
