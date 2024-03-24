<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240317144216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        if (!$schema->hasTable('pizza')) {
            $this->createTablePizza($schema);
            $this->addForeignKeyConstraintCategory($schema);
        }
    }

    public function down(Schema $schema): void
    {
        $schema->getTable('pizza')->removeForeignKey('fk_pizza_category');
        $schema->dropTable('pizza');
    }

    private function createTablePizza(Schema $schema): void
    {
        $table = $schema->createTable('pizza');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('name', 'string', ['length' => 255]);
        $table->addColumn('price', 'decimal', ['precision' => 10, 'scale' => 2]);
        $table->addColumn('category_id', 'integer', ['notnull' => true]);
        $table->setPrimaryKey(['id']);
    }

    private function addForeignKeyConstraintCategory(Schema $schema): void
    {
        $table = $schema->getTable('pizza');
        $table->addForeignKeyConstraint('category', ['category_id'], ['id'], ['onDelete' => 'CASCADE']);
    }
}
