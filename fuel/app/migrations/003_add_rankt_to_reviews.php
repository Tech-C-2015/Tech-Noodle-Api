<?php

namespace Fuel\Migrations;

class Add_rankt_to_reviews
{
	public function up()
	{
		\DBUtil::add_fields('reviews', array(
			'rank' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('reviews', array(
			'rank'

		));
	}
}