<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Carts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' => null,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('carts');
    }

    public function down()
    {
        $this->forge->dropTable('carts');
    }
}
