<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembayaranTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembayaran' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'id_pemesanan' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'jumlah_pembayaran' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'tanggal_pembayaran' => [
                'type' => 'DATE',
            ],
            'nama_pelanggan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nomor_pemesanan' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'dari_bank' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'ke_bank' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'default' => 'CURRENT_TIMESTAMP',
                'on_update' => 'CURRENT_TIMESTAMP',
            ],
            'catatan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_pembayaran', true);
        $this->forge->addForeignKey('id_pemesanan', 'pemesanan', 'id_pemesanan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
