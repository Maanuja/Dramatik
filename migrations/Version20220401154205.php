<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220401154205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE drama ADD dr_genre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE drama ADD CONSTRAINT FK_C855ABB4F3698322 FOREIGN KEY (dr_genre_id) REFERENCES genre (id)');
        $this->addSql('CREATE INDEX IDX_C855ABB4F3698322 ON drama (dr_genre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE drama DROP FOREIGN KEY FK_C855ABB4F3698322');
        $this->addSql('DROP INDEX IDX_C855ABB4F3698322 ON drama');
        $this->addSql('ALTER TABLE drama DROP dr_genre_id');
    }
}
