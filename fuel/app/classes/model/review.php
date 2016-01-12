<?php
use Orm\Model;

class Model_Review extends Model
{
	protected static $_properties = array(
		'id',
		'user_name',
		'review',
		'shop_id',
		'created_at',
		'updated_at',
		'rank',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('user_name', 'User Name', 'required|max_length[255]');
		$val->add_field('review', 'Review', 'required|max_length[255]');
		$val->add_field('shop_id', 'Shop Id', 'required|valid_string[numeric]');

		return $val;
	}

}
