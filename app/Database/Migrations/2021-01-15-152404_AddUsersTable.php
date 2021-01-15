<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsersTable extends Migration
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
            'user_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'user_email' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'user_password' => [
                'type'           => 'VARCHAR',
                'constraint'     => '200',
            ],
            'created_at' => [
                'type'           => 'timestamp',
                'Default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id', true);

        $this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('users');
	}
}
