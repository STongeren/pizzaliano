<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240317134311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add category_id column to pizza table and connect it to category table';
    }

    public function up(Schema $schema): void
    {
        // Add category_id column to pizza table
        $this->addSql('ALTER TABLE pizza ADD category_id INT DEFAULT NULL');

        // Add foreign key constraint to connect pizza.category_id to category.id
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT FK_category FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // Drop foreign key constraint
        $this->addSql('ALTER TABLE pizza DROP FOREIGN KEY FK_category');
        
    }
}
