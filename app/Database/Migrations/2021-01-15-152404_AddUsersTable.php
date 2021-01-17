<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsersTable extends Migration
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
            'role_id'            => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 5,
            ],
            'subject_id'         => [
                'type'           => 'INT',
                'unsigned'       => true,
                'constraint'     => 5,
                'null'           => true
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
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('role_id', 'roles', 'id', false, false);
        $this->forge->addForeignKey('subject_id', 'subjects', 'id', false, false);
        $this->forge->createTable('users');

        $this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('users');
	}
}
