<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ComputerMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_computer' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'asset_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'device_id' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'login_user' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'nama_produk' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'serial_number' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'mac_address' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'prosesor' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'ram' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'rom' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'user' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id_computer', true);
        $this->forge->createTable('computer');
    }

    public function down()
    {
        $this->forge->dropTable('computer');
    }
}
