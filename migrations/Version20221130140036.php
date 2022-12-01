<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221130140036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE measure ADD provider_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE measure ADD CONSTRAINT FK_80071925A53A8AA FOREIGN KEY (provider_id) REFERENCES provider (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_80071925A53A8AA ON measure (provider_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE measure DROP FOREIGN KEY FK_80071925A53A8AA');
        $this->addSql('DROP INDEX UNIQ_80071925A53A8AA ON measure');
        $this->addSql('ALTER TABLE measure DROP provider_id');
    }
}
