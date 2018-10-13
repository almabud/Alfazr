<?php
class Migration_Create_hotel extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'Address' => array(
                'type' => 'TEXT'
            ),
            'about' => array(
                'type' => 'TEXT'
            ),
            'status' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'created_date_time' => array(
                'type' => 'timestamp not null default current_timestamp'
            )
		));
		$this->dbforge->add_key('id');
		$this->dbforge->create_table('hotels');
	}

	public function down()
	{
		$this->dbforge->drop_table('hotels');
	}
}
