<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DepartemenMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_departemen' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'kode_departemen' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'nama_departemen' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at' => [
                'type'       => 'DATETIME',
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
            ],
            'deleted_at' => [
                'type'       => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id_departemen', true);
        $this->forge->createTable('departemen');
    }

    public function down()
    {
        $this->forge->dropTable('departemen');
    }
}
