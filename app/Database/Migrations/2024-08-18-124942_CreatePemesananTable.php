<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePemesananTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pemesanan' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'primary_key' => true,
            ],
            'id_produk' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'nama_pelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tanggal_pemesanan' => [
                'type' => 'DATE',
            ],
            'kuantitas' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'status_pemesanan' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'link_tracking' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'histori_pengiriman' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_pemesanan', true);
        $this->forge->createTable('pemesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pemesanan');
    }
}
