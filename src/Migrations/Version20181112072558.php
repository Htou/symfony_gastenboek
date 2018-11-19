<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181112072558 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE gastenboek CHANGE titel titel LONGTEXT DEFAULT NULL, CHANGE naam naam LONGTEXT DEFAULT NULL, CHANGE email email LONGTEXT DEFAULT NULL, CHANGE body body LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE gastenboek CHANGE titel titel LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE naam naam LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE body body LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
