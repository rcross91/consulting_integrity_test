<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddArea extends Migration
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
            'nro_empleados' => [
                'type'       => 'INT',
                'constraint' => 10,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('areas');
    }

    public function down()
    {
        $this->forge->dropTable('areas');
    }
}