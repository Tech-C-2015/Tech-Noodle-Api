<?php


class MyFormat extends Fuel\Core\Format {
    
    public function to_json($data = null, $pretty = false)
	{
		if ($data === null)
		{
			$data = $this->_data;
		}

		// To allow exporting ArrayAccess objects like Orm\Model instances they need to be
		// converted to an array first
		$data = (is_array($data) or is_object($data)) ? $this->to_array($data) : $data;
        //return $pretty ? static::pretty_json($data) : json_encode($data, \Config::get('format.json.encode.options', JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP));
        return $pretty ? static::pretty_json($data) : json_encode($data, \Config::get('format.json.encode.options', JSON_UNESCAPED_UNICODE));
	}

}

