<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'category' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'description' => ['type' => 'TEXT', 'null' => true],
            'price' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'stock' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
            'updated_at' => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP', 'on update' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('slug');
        $this->forge->createTable('products', true);
    }

    public function down()
    {
        $this->forge->dropTable('products', true);
    }
}
