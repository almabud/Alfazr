<?php
class Migration_Create_users extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
			)
		));
		$this->dbforge->add_key('id');
		$this->dbforge->create_table('users_log');
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}