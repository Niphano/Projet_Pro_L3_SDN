<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230328155310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercices DROP test_id');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0C1E5D0459');
        $this->addSql('DROP INDEX IDX_D87F7E0C1E5D0459 ON test');
        $this->addSql('ALTER TABLE test ADD inputs JSON NOT NULL, ADD outputs JSON NOT NULL, CHANGE test_id exercice_id INT NOT NULL');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0C89D40298 FOREIGN KEY (exercice_id) REFERENCES exercices (id)');
        $this->addSql('CREATE INDEX IDX_D87F7E0C89D40298 ON test (exercice_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercices ADD test_id INT NOT NULL');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0C89D40298');
        $this->addSql('DROP INDEX IDX_D87F7E0C89D40298 ON test');
        $this->addSql('ALTER TABLE test DROP inputs, DROP outputs, CHANGE exercice_id test_id INT NOT NULL');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0C1E5D0459 FOREIGN KEY (test_id) REFERENCES test (id)');
        $this->addSql('CREATE INDEX IDX_D87F7E0C1E5D0459 ON test (test_id)');
    }
}
