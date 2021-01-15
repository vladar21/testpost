<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPostsTable extends Migration
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
            'user_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'null'           => true
            ],
            'post_title'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'post_description' => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'image_url' => [
                'type'           => 'VARCHAR',
                'constraint'     => '300',
                'null'           => true,
            ],
            'created_at' => [
                'type'           => 'timestamp',
                'Default' => 'CURRENT_TIMESTAMP',
            ],
            'updated_at' => [
                'type'           => 'timestamp',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', false, false);
        $this->forge->createTable('posts');

        $this->db->enableForeignKeyChecks();
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('posts');
	}
}
