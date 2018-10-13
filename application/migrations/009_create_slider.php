<?php
class Migration_Create_slider extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
            'photo' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'Photo_text' => array(
				'type' => 'TEXT',
            )
		));
        $this->dbforge->add_key('id');
		$this->dbforge->create_table('slider');
	}

	public function down()
	{
		$this->dbforge->drop_table('slider');
	}
}
