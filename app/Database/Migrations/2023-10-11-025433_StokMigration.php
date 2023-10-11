<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StokMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_stok' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'kode_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'stok' => [
                'type'       => 'INT',
            ],
            'satuan' => [
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
        $this->forge->addKey('id_stok', true);
        $this->forge->createTable('stok');
    }

    public function down()
    {
        $this->forge->dropTable('stok');
    }
}
