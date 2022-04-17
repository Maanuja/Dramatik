<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220215172157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actor (id INT AUTO_INCREMENT NOT NULL, ac_name VARCHAR(30) NOT NULL, ac_img VARCHAR(100) NOT NULL, ac_drama LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, ch_name VARCHAR(15) NOT NULL, ch_drama INT NOT NULL, ch_qualities LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choices (id INT AUTO_INCREMENT NOT NULL, ch_question INT NOT NULL, ch_choice LONGTEXT DEFAULT NULL, ch_true TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, cm_user INT NOT NULL, cm_comment LONGTEXT NOT NULL, cm_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, ct_fname VARCHAR(40) NOT NULL, ct_lname VARCHAR(40) NOT NULL, ct_mail VARCHAR(75) NOT NULL, ct_tel VARCHAR(15) NOT NULL, ct_message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE critic (id INT AUTO_INCREMENT NOT NULL, cr_user INT NOT NULL, cr_drama INT NOT NULL, cr_created_at DATETIME NOT NULL, cr_updated_at DATETIME DEFAULT NULL, cr_title VARCHAR(50) NOT NULL, cr_critic LONGTEXT NOT NULL, cr_like INT DEFAULT NULL, cr_story INT NOT NULL, cr_music NUMERIC(2, 1) NOT NULL, cr_casting NUMERIC(2, 1) NOT NULL, cr_rate NUMERIC(2, 1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE drama (id INT AUTO_INCREMENT NOT NULL, dr_name VARCHAR(40) NOT NULL, dr_date DATE NOT NULL, dr_nb_ep INT NOT NULL, dr_rate NUMERIC(2, 1) DEFAULT NULL, dr_img VARCHAR(100) NOT NULL, dr_banner_img VARCHAR(100) NOT NULL, dr_video VARCHAR(300) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, gr_name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, nsl_mail VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, qt_question LONGTEXT NOT NULL, qt_quizz INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quizz (id INT AUTO_INCREMENT NOT NULL, qz_name VARCHAR(300) NOT NULL, qz_user INT NOT NULL, qz_drama INT NOT NULL, qz_created_at DATETIME NOT NULL, qz_updated_at DATETIME DEFAULT NULL, qz_format VARCHAR(10) NOT NULL, qz_img VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, sc_user INT NOT NULL, sc_quizz INT NOT NULL, sc_score INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, us_user VARCHAR(16) NOT NULL, us_pass VARCHAR(16) NOT NULL, us_lname VARCHAR(20) NOT NULL, us_fname VARCHAR(20) NOT NULL, us_mail VARCHAR(50) NOT NULL, us_role VARCHAR(20) NOT NULL, us_ban_img VARCHAR(100) NOT NULL, us_img VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE actor');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE choices');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE critic');
        $this->addSql('DROP TABLE drama');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE quizz');
        $this->addSql('DROP TABLE score');
        $this->addSql('DROP TABLE `user`');
    }
    public function isTransactional(): bool
    {
        return false;
    }
}
