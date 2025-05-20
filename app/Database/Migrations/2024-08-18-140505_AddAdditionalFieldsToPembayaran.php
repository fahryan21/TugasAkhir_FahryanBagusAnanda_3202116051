<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAdditionalFieldsToPembayaran extends Migration
{
    public function up()
    {
        $this->forge->addColumn('pembayaran', [
            'catatan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('pembayaran', 'catatan');
    }
}
