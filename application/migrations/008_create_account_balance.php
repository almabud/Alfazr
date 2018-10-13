<?php
class Migration_Create_account_balance extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
            'profile_id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE
            ),
            'amount' => array(
                'type' => 'DECIMAL',
                'constraint' => '11,5'
            ),
            'created_date_time' => array(
                'type' => 'timestamp not null default current_timestamp on update current_timestamp'
            )
		));
        $this->dbforge->add_key('id');
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (profile_id) REFERENCES users_log(id) ON DELETE CASCADE ON UPDATE CASCADE');
		$this->dbforge->create_table('account_balance');
	}

	public function down()
	{
		$this->dbforge->drop_table('account_balance');
	}
}
