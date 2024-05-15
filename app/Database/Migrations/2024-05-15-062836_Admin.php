<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'fullname' => ['type' => 'VARCHAR', 'constraint' => 100],
            'username' => ['type' => 'VARCHAR', 'constraint' => 50],
            'email' => ['type' => 'VARCHAR', 'constraint' => 100],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255],
            'phone_number' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'created_at' => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP'],
            'updated_at' => ['type' => 'TIMESTAMP', 'default' => 'CURRENT_TIMESTAMP', 'on update' => 'CURRENT_TIMESTAMP'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('username');
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('admin', true);
    }

    public function down()
    {
        $this->forge->dropTable('admin', true);
    }
}
