<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 50,
                'auto_increment' => true,
            ],
            'reference' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'transaction_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'total_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' => null,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'Menunggu Diproses',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('reference');
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
