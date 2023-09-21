<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OtherMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_other' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'device_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'serial_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'plant' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'lokasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'ip' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
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
        $this->forge->addKey('id_other', true);
        $this->forge->createTable('other');
    }

    public function down()
    {
        $this->forge->dropTable('other');
    }
}
