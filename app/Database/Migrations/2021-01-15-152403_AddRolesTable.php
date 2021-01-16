<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRolesTable extends Migration
{
	public function up()
	{

        $this->forge->addField([
            'id'               => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'role_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('roles');


	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('roles');
	}
}
