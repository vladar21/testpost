<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSubjectsTable extends Migration
{
	public function up()
	{
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'               => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'subject_title'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('subjects');

        $this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('subjects');
	}
}
