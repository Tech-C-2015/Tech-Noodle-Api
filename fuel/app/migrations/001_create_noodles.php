<?php

namespace Fuel\Migrations;

class Create_noodles
{
	public function up()
	{
		\DBUtil::create_table('noodles', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'prefecture' => array('constraint' => 255, 'type' => 'varchar'),
			'region' => array('constraint' => 255, 'type' => 'varchar'),
			'address' => array('constraint' => 255, 'type' => 'varchar'),
			'tel' => array('constraint' => 255, 'type' => 'varchar'),
			'open' => array('constraint' => 255, 'type' => 'varchar'),
			'station' => array('constraint' => 255, 'type' => 'varchar'),
			'image' => array('constraint' => 255, 'type' => 'varchar'),
			'link' => array('constraint' => 255, 'type' => 'varchar'),
			'tag' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('noodles');
	}
}