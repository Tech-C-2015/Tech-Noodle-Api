<?php
use Orm\Model;

class Model_Noodle extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'prefecture',
		'region',
		'address',
		'tel',
		'open',
		'station',
		'image',
		'link',
		'tag',
		'created_at',
		'updated_at',
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
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('prefecture', 'Prefecture', 'required|max_length[255]');
		$val->add_field('region', 'Region', 'required|max_length[255]');
		$val->add_field('address', 'Address', 'required|max_length[255]');
		$val->add_field('tel', 'Tel', 'required|max_length[255]');
		$val->add_field('station', 'Station', 'required|max_length[255]');

		return $val;
	}

}
