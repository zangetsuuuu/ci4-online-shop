<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PasswordResets extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'is_expired' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('password_resets');
    }

    public function down()
    {
        $this->forge->dropTable('password_resets');
    }
}
