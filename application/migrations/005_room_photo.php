<?php
class Migration_Room_photo extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
            ),
            'room_photo' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'hotel_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
			),
		));
        $this->dbforge->add_key('id');
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (hotel_id) REFERENCES hotels(id) ON DELETE CASCADE ON UPDATE CASCADE');
		$this->dbforge->create_table('room_photo_table');
	}

	public function down()
	{
		$this->dbforge->drop_table('room_photo_table');
	}
}
