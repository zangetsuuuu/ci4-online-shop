<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admins extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'fullname' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'gender' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'Admin',
            ],
            'avatar' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'default' => 'default-avatar.webp',
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
        $this->forge->addUniqueKey(['username', 'email']);
        $this->forge->createTable('admins');
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
