<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220315093445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CC2725C77');
        $this->addSql('DROP INDEX IDX_9474526CC2725C77 ON comment');
        $this->addSql('ALTER TABLE comment DROP cm_user_id');
        $this->addSql('ALTER TABLE user CHANGE us_role us_role ENUM(\'admin\', \'user\') NOT NULL COMMENT \'(DC2Type:enumFormat)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD cm_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CC2725C77 FOREIGN KEY (cm_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9474526CC2725C77 ON comment (cm_user_id)');
        $this->addSql('ALTER TABLE `user` CHANGE us_role us_role ENUM(\'5\', \'7\', \'10\') CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:enumFormat)\'');
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
