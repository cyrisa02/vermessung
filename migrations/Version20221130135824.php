<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221130135824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE measure ADD quotation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE measure ADD CONSTRAINT FK_80071925B4EA4E60 FOREIGN KEY (quotation_id) REFERENCES quotation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_80071925B4EA4E60 ON measure (quotation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE measure DROP FOREIGN KEY FK_80071925B4EA4E60');
        $this->addSql('DROP INDEX UNIQ_80071925B4EA4E60 ON measure');
        $this->addSql('ALTER TABLE measure DROP quotation_id');
    }
}
