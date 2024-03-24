<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240317140000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Drop the foreign key constraint
        $this->addSql('ALTER TABLE pizza DROP FOREIGN KEY fk_pizza_category');

        // Drop the category_id column
        $this->addSql('ALTER TABLE pizza DROP COLUMN IF EXISTS category_id');
    }

    public function down(Schema $schema): void
    {
        // Add the category_id column
        $this->addSql('ALTER TABLE pizza ADD category_id INT DEFAULT NULL');

        // Add the foreign key constraint
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT fk_pizza_category FOREIGN KEY (category_id) REFERENCES category (id)');
    }
}
