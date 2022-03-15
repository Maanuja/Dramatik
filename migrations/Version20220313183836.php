<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220313183836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` CHANGE ch_drama ch_drama_id INT NOT NULL');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0345AAC07F2 FOREIGN KEY (ch_drama_id) REFERENCES drama (id)');
        $this->addSql('CREATE INDEX IDX_937AB0345AAC07F2 ON `character` (ch_drama_id)');
        $this->addSql('ALTER TABLE choices CHANGE ch_question ch_question_id INT NOT NULL');
        $this->addSql('ALTER TABLE choices ADD CONSTRAINT FK_5CE96394EB85828 FOREIGN KEY (ch_question_id) REFERENCES questions (id)');
        $this->addSql('CREATE INDEX IDX_5CE96394EB85828 ON choices (ch_question_id)');
        $this->addSql('ALTER TABLE comment ADD cm_drama_id INT NOT NULL, CHANGE cm_user cm_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CC2725C77 FOREIGN KEY (cm_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBC85CCB6 FOREIGN KEY (cm_drama_id) REFERENCES drama (id)');
        $this->addSql('CREATE INDEX IDX_9474526CC2725C77 ON comment (cm_user_id)');
        $this->addSql('CREATE INDEX IDX_9474526CBC85CCB6 ON comment (cm_drama_id)');
        $this->addSql('ALTER TABLE critic ADD cr_user_id INT NOT NULL, ADD cr_drama_id INT NOT NULL, DROP cr_user, DROP cr_drama');
        $this->addSql('ALTER TABLE critic ADD CONSTRAINT FK_C9E2F7F1B10BD1D7 FOREIGN KEY (cr_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE critic ADD CONSTRAINT FK_C9E2F7F16A2016D3 FOREIGN KEY (cr_drama_id) REFERENCES drama (id)');
        $this->addSql('CREATE INDEX IDX_C9E2F7F1B10BD1D7 ON critic (cr_user_id)');
        $this->addSql('CREATE INDEX IDX_C9E2F7F16A2016D3 ON critic (cr_drama_id)');
        $this->addSql('ALTER TABLE questions CHANGE qt_quizz qt_quizz_id INT NOT NULL');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D5D9D3033E FOREIGN KEY (qt_quizz_id) REFERENCES quizz (id)');
        $this->addSql('CREATE INDEX IDX_8ADC54D5D9D3033E ON questions (qt_quizz_id)');
        $this->addSql('ALTER TABLE quizz CHANGE qz_format qz_format ENUM(\'5\', \'7\', \'10\') NOT NULL COMMENT \'(DC2Type:enumFormat)\', CHANGE qz_user qz_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE quizz ADD CONSTRAINT FK_7C77973D2988221A FOREIGN KEY (qz_user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_7C77973D2988221A ON quizz (qz_user_id)');
        $this->addSql('ALTER TABLE score ADD sc_user_id INT NOT NULL, ADD sc_quizz_id INT NOT NULL, DROP sc_user, DROP sc_quizz');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_329937512D1E060D FOREIGN KEY (sc_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_3299375144CD206E FOREIGN KEY (sc_quizz_id) REFERENCES quizz (id)');
        $this->addSql('CREATE INDEX IDX_329937512D1E060D ON score (sc_user_id)');
        $this->addSql('CREATE INDEX IDX_3299375144CD206E ON score (sc_quizz_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0345AAC07F2');
        $this->addSql('DROP INDEX IDX_937AB0345AAC07F2 ON `character`');
        $this->addSql('ALTER TABLE `character` CHANGE ch_drama_id ch_drama INT NOT NULL');
        $this->addSql('ALTER TABLE choices DROP FOREIGN KEY FK_5CE96394EB85828');
        $this->addSql('DROP INDEX IDX_5CE96394EB85828 ON choices');
        $this->addSql('ALTER TABLE choices CHANGE ch_question_id ch_question INT NOT NULL');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CC2725C77');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CBC85CCB6');
        $this->addSql('DROP INDEX IDX_9474526CC2725C77 ON comment');
        $this->addSql('DROP INDEX IDX_9474526CBC85CCB6 ON comment');
        $this->addSql('ALTER TABLE comment ADD cm_user INT NOT NULL, DROP cm_user_id, DROP cm_drama_id');
        $this->addSql('ALTER TABLE critic DROP FOREIGN KEY FK_C9E2F7F1B10BD1D7');
        $this->addSql('ALTER TABLE critic DROP FOREIGN KEY FK_C9E2F7F16A2016D3');
        $this->addSql('DROP INDEX IDX_C9E2F7F1B10BD1D7 ON critic');
        $this->addSql('DROP INDEX IDX_C9E2F7F16A2016D3 ON critic');
        $this->addSql('ALTER TABLE critic ADD cr_user INT NOT NULL, ADD cr_drama INT NOT NULL, DROP cr_user_id, DROP cr_drama_id');
        $this->addSql('ALTER TABLE questions DROP FOREIGN KEY FK_8ADC54D5D9D3033E');
        $this->addSql('DROP INDEX IDX_8ADC54D5D9D3033E ON questions');
        $this->addSql('ALTER TABLE questions CHANGE qt_quizz_id qt_quizz INT NOT NULL');
        $this->addSql('ALTER TABLE quizz DROP FOREIGN KEY FK_7C77973D2988221A');
        $this->addSql('DROP INDEX IDX_7C77973D2988221A ON quizz');
        $this->addSql('ALTER TABLE quizz CHANGE qz_format qz_format VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE qz_user_id qz_user INT NOT NULL');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937512D1E060D');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_3299375144CD206E');
        $this->addSql('DROP INDEX IDX_329937512D1E060D ON score');
        $this->addSql('DROP INDEX IDX_3299375144CD206E ON score');
        $this->addSql('ALTER TABLE score ADD sc_user INT NOT NULL, ADD sc_quizz INT NOT NULL, DROP sc_user_id, DROP sc_quizz_id');
    }
}
