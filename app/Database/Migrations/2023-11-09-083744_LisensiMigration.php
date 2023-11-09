<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LisensiMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_lisensi' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'kode_lisensi' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'product_key' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'jenis' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'status' => [
                'type'       => 'INT',
                'constraint' => '2',
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
        $this->forge->addKey('id_lisensi', true);
        $this->forge->createTable('lisensi');
    }

    public function down()
    {
        $this->forge->dropTable('lisensi');
    }
}
