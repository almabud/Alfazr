<?php
class Migration_Create_reservation extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
            ),
            'guest_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'guest_email' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'guest_contact' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'check_in' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'check_out' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'hotel_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ),
            'room_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ),
            'quantity' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ),
            'price' => array(
                'type' => 'DECIMAL',
                'constraint' => '11,5'
            ),
            'payment_status' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'resrve_status' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'profile_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
            ),
            'reff' => array(
                'type' => 'VARCHAR',
                'constraint' => '255'
            ),
            'created_date_time' => array(
                'type' => 'timestamp not null default current_timestamp'
            )
		));
        $this->dbforge->add_key('id');
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (hotel_id) REFERENCES backup_hotels(id) ON DELETE CASCADE ON UPDATE CASCADE');
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (room_id) REFERENCES backup_rooms(id) ON DELETE CASCADE ON UPDATE CASCADE');
		$this->dbforge->create_table('reservation');
	}

	public function down()
	{
		$this->dbforge->drop_table('reservation');
	}
}
