<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221130133731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quotation ADD measure_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE quotation ADD CONSTRAINT FK_474A8DB95DA37D00 FOREIGN KEY (measure_id) REFERENCES measure (id)');
        $this->addSql('CREATE INDEX IDX_474A8DB95DA37D00 ON quotation (measure_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quotation DROP FOREIGN KEY FK_474A8DB95DA37D00');
        $this->addSql('DROP INDEX IDX_474A8DB95DA37D00 ON quotation');
        $this->addSql('ALTER TABLE quotation DROP measure_id');
    }
}
