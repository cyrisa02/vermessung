<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221130120648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quotation ADD provider_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quotation ADD CONSTRAINT FK_474A8DB9A53A8AA FOREIGN KEY (provider_id) REFERENCES provider (id)');
        $this->addSql('CREATE INDEX IDX_474A8DB9A53A8AA ON quotation (provider_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quotation DROP FOREIGN KEY FK_474A8DB9A53A8AA');
        $this->addSql('DROP INDEX IDX_474A8DB9A53A8AA ON quotation');
        $this->addSql('ALTER TABLE quotation DROP provider_id');
    }
}
