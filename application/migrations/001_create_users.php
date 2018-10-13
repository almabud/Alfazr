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
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => TRUE
            ),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '128'
			),
            'role' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'status' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unsigned' => TRUE
			),
			'F_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			),
			'L_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			),
            'd_birth' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'gender' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'country' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'Address' => array(
                'type' => 'TEXT'
            ),
			'profile_photo' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
			),
			'cover_photo' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
			),
			'contact_no' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
			),
			'verify' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unsigned' => TRUE
            )
		));
		$this->dbforge->add_key('id');
		$this->dbforge->create_table('users_log');
	}

	public function down()
	{
		$this->dbforge->drop_table('users_log');
	}
}
