<?php
/**
 * Created by PhpStorm.
 * User: Almabud Sohan
 * Date: 25-Jul-18
 * Time: 1:17 PM
 */

class Migration_Profile_Photo extends CI_Migration{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'img' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'pro_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            )

        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('l_id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (pro_id) REFERENCES profile(id) ON DELETE CASCADE ON UPDATE CASCADE');
        $this->dbforge->create_table('profile_photo');
    }

    public function down()
    {
        $this->dbforge->drop_table('profile_photo');
    }

}