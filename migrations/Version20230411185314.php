<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411185314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE my_match ADD sender_id INT NOT NULL, ADD receiver_id INT NOT NULL');
        $this->addSql('ALTER TABLE my_match ADD CONSTRAINT FK_169D77C1F624B39D FOREIGN KEY (sender_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE my_match ADD CONSTRAINT FK_169D77C1CD53EDB6 FOREIGN KEY (receiver_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_169D77C1F624B39D ON my_match (sender_id)');
        $this->addSql('CREATE INDEX IDX_169D77C1CD53EDB6 ON my_match (receiver_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE my_match DROP FOREIGN KEY FK_169D77C1F624B39D');
        $this->addSql('ALTER TABLE my_match DROP FOREIGN KEY FK_169D77C1CD53EDB6');
        $this->addSql('DROP INDEX IDX_169D77C1F624B39D ON my_match');
        $this->addSql('DROP INDEX IDX_169D77C1CD53EDB6 ON my_match');
        $this->addSql('ALTER TABLE my_match DROP sender_id, DROP receiver_id');
    }
}
