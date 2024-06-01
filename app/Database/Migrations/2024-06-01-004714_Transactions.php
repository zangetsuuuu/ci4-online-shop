<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transactions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'midtrans_transaction_id' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'midtrans_order_id' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'payment_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'transaction_time' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'fraud_status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => null,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
