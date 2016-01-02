<?php
class Controller_Base extends Controller_Hybrid
{
    protected $format = "";
	public function before()
	{
		parent::before();
        if($this->format === "json"){
            $request->set_header('Content-Type', 'application/json');
        }
	}
}
