<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEmpleado extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'birth_date' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'area_id' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('area_id', 'areas', 'id');
        $this->forge->createTable('empleados');
    }

    public function down()
    {
        $this->forge->dropTable('empleados');
    }
}