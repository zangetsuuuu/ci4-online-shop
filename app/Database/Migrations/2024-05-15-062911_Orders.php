<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'reference' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'customer_id' => ['type' => 'INT', 'constraint' => 11],
            'transaction_id' => ['type' => 'INT', 'constraint' => 11, 'null' => true],
            'total_price' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'created_at' => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
            'updated_at' => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP', 'on update' => 'CURRENT_TIMESTAMP'],
            'status' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'pending'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('reference');
        $this->forge->addForeignKey('customer_id', 'customers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('transaction_id', 'transactions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('orders', true);
    }

    public function down()
    {
        $this->forge->dropTable('orders', true);
    }
}
