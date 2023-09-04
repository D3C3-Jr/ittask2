<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PrinterMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_printer' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'device_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'merk' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'model' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'mac_sn' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'plant' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->addKey('id_printer', true);
        $this->forge->createTable('printer');
    }

    public function down()
    {
        $this->forge->dropTable('printer');
    }
}
