<?php
class Migration_User_Profile extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'F_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'L_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
            'Address' => array(
                'type' => 'TEXT'
            ),
            'Role' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'l_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ),
            'Role' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            )

		));
		$this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (l_id) REFERENCES users_log(id) ON DELETE CASCADE ON UPDATE CASCADE');
		$this->dbforge->create_table('profile');
	}

	public function down()
	{
		$this->dbforge->drop_table('profile');
	}
}