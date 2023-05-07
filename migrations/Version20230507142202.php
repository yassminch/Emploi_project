<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230507142202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affectation_semain DROP FOREIGN KEY FK_2B1B2C35483E3D95');
        $this->addSql('ALTER TABLE affectation_semain DROP FOREIGN KEY FK_2B1B2C356D0ABA22');
        $this->addSql('DROP TABLE affectation_semain');
        $this->addSql('ALTER TABLE jour DROP FOREIGN KEY FK_DA17D9C56D0ABA22');
        $this->addSql('DROP INDEX IDX_DA17D9C56D0ABA22 ON jour');
        $this->addSql('ALTER TABLE jour DROP affectation_id');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574A6D0ABA22');
        $this->addSql('DROP INDEX IDX_9014574A6D0ABA22 ON matiere');
        $this->addSql('ALTER TABLE matiere DROP affectation_id');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5C6D0ABA22');
        $this->addSql('DROP INDEX IDX_4E977E5C6D0ABA22 ON salle');
        $this->addSql('ALTER TABLE salle DROP affectation_id');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E6D0ABA22');
        $this->addSql('DROP INDEX IDX_DF7DFD0E6D0ABA22 ON seance');
        $this->addSql('ALTER TABLE seance DROP affectation_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affectation_semain (affectation_id INT NOT NULL, semain_id INT NOT NULL, INDEX IDX_2B1B2C35483E3D95 (semain_id), INDEX IDX_2B1B2C356D0ABA22 (affectation_id), PRIMARY KEY(affectation_id, semain_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE affectation_semain ADD CONSTRAINT FK_2B1B2C35483E3D95 FOREIGN KEY (semain_id) REFERENCES semain (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE affectation_semain ADD CONSTRAINT FK_2B1B2C356D0ABA22 FOREIGN KEY (affectation_id) REFERENCES affectation (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seance ADD affectation_id INT NOT NULL');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E6D0ABA22 FOREIGN KEY (affectation_id) REFERENCES affectation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E6D0ABA22 ON seance (affectation_id)');
        $this->addSql('ALTER TABLE jour ADD affectation_id INT NOT NULL');
        $this->addSql('ALTER TABLE jour ADD CONSTRAINT FK_DA17D9C56D0ABA22 FOREIGN KEY (affectation_id) REFERENCES affectation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_DA17D9C56D0ABA22 ON jour (affectation_id)');
        $this->addSql('ALTER TABLE salle ADD affectation_id INT NOT NULL');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5C6D0ABA22 FOREIGN KEY (affectation_id) REFERENCES affectation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_4E977E5C6D0ABA22 ON salle (affectation_id)');
        $this->addSql('ALTER TABLE matiere ADD affectation_id INT NOT NULL');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574A6D0ABA22 FOREIGN KEY (affectation_id) REFERENCES affectation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9014574A6D0ABA22 ON matiere (affectation_id)');
    }
}
