<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221130150550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE measure ADD providers_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE measure ADD CONSTRAINT FK_80071925D178A47B FOREIGN KEY (providers_id) REFERENCES provider (id)');
        $this->addSql('CREATE INDEX IDX_80071925D178A47B ON measure (providers_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE measure DROP FOREIGN KEY FK_80071925D178A47B');
        $this->addSql('DROP INDEX IDX_80071925D178A47B ON measure');
        $this->addSql('ALTER TABLE measure DROP providers_id');
    }
}
