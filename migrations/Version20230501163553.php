<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230501163553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affectation (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE affectation_semain (affectation_id INT NOT NULL, semain_id INT NOT NULL, INDEX IDX_2B1B2C356D0ABA22 (affectation_id), INDEX IDX_2B1B2C35483E3D95 (semain_id), PRIMARY KEY(affectation_id, semain_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bloc (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, matiere_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_8F87BF96F46CD258 (matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jour (id INT AUTO_INCREMENT NOT NULL, affectation_id INT NOT NULL, INDEX IDX_DA17D9C56D0ABA22 (affectation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, affectation_id INT NOT NULL, nom_mat VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_9014574A6D0ABA22 (affectation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, bloc_id INT NOT NULL, affectation_id INT NOT NULL, vidproj TINYINT(1) DEFAULT NULL, INDEX IDX_4E977E5C5582E9C0 (bloc_id), INDEX IDX_4E977E5C6D0ABA22 (affectation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance (id INT AUTO_INCREMENT NOT NULL, affectation_id INT NOT NULL, INDEX IDX_DF7DFD0E6D0ABA22 (affectation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semain (id INT AUTO_INCREMENT NOT NULL, semester_id INT NOT NULL, INDEX IDX_F3CA34894A798B6F (semester_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semester (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE affectation_semain ADD CONSTRAINT FK_2B1B2C356D0ABA22 FOREIGN KEY (affectation_id) REFERENCES affectation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE affectation_semain ADD CONSTRAINT FK_2B1B2C35483E3D95 FOREIGN KEY (semain_id) REFERENCES semain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE jour ADD CONSTRAINT FK_DA17D9C56D0ABA22 FOREIGN KEY (affectation_id) REFERENCES affectation (id)');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574A6D0ABA22 FOREIGN KEY (affectation_id) REFERENCES affectation (id)');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5C5582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id)');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5C6D0ABA22 FOREIGN KEY (affectation_id) REFERENCES affectation (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E6D0ABA22 FOREIGN KEY (affectation_id) REFERENCES affectation (id)');
        $this->addSql('ALTER TABLE semain ADD CONSTRAINT FK_F3CA34894A798B6F FOREIGN KEY (semester_id) REFERENCES semester (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affectation_semain DROP FOREIGN KEY FK_2B1B2C356D0ABA22');
        $this->addSql('ALTER TABLE affectation_semain DROP FOREIGN KEY FK_2B1B2C35483E3D95');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96F46CD258');
        $this->addSql('ALTER TABLE jour DROP FOREIGN KEY FK_DA17D9C56D0ABA22');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574A6D0ABA22');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5C5582E9C0');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5C6D0ABA22');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E6D0ABA22');
        $this->addSql('ALTER TABLE semain DROP FOREIGN KEY FK_F3CA34894A798B6F');
        $this->addSql('DROP TABLE affectation');
        $this->addSql('DROP TABLE affectation_semain');
        $this->addSql('DROP TABLE bloc');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE jour');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE seance');
        $this->addSql('DROP TABLE semain');
        $this->addSql('DROP TABLE semester');
        $this->addSql('DROP TABLE user');
    }
}
