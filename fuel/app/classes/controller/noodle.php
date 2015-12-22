<?php
class Controller_Noodle extends Controller_Template
{

	public function action_index()
	{
		$data['noodles'] = Model_Noodle::find('all');
		$this->template->title = "Noodles";
		$this->template->content = View::forge('noodle/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('noodle');

		if ( ! $data['noodle'] = Model_Noodle::find($id))
		{
			Session::set_flash('error', 'Could not find noodle #'.$id);
			Response::redirect('noodle');
		}

		$this->template->title = "Noodle";
		$this->template->content = View::forge('noodle/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Noodle::validate('create');

			if ($val->run())
			{
				$noodle = Model_Noodle::forge(array(
					'name' => Input::post('name'),
					'prefecture' => Input::post('prefecture'),
					'region' => Input::post('region'),
					'address' => Input::post('address'),
					'tel' => Input::post('tel'),
					'open' => Input::post('open'),
					'station' => Input::post('station'),
					'image' => Input::post('image'),
					'link' => Input::post('link'),
					'tag' => Input::post('tag'),
				));

				if ($noodle and $noodle->save())
				{
					Session::set_flash('success', 'Added noodle #'.$noodle->id.'.');

					Response::redirect('noodle');
				}

				else
				{
					Session::set_flash('error', 'Could not save noodle.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Noodles";
		$this->template->content = View::forge('noodle/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('noodle');

		if ( ! $noodle = Model_Noodle::find($id))
		{
			Session::set_flash('error', 'Could not find noodle #'.$id);
			Response::redirect('noodle');
		}

		$val = Model_Noodle::validate('edit');

		if ($val->run())
		{
			$noodle->name = Input::post('name');
			$noodle->prefecture = Input::post('prefecture');
			$noodle->region = Input::post('region');
			$noodle->address = Input::post('address');
			$noodle->tel = Input::post('tel');
			$noodle->open = Input::post('open');
			$noodle->station = Input::post('station');
			$noodle->image = Input::post('image');
			$noodle->link = Input::post('link');
			$noodle->tag = Input::post('tag');

			if ($noodle->save())
			{
				Session::set_flash('success', 'Updated noodle #' . $id);

				Response::redirect('noodle');
			}

			else
			{
				Session::set_flash('error', 'Could not update noodle #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$noodle->name = $val->validated('name');
				$noodle->prefecture = $val->validated('prefecture');
				$noodle->region = $val->validated('region');
				$noodle->address = $val->validated('address');
				$noodle->tel = $val->validated('tel');
				$noodle->open = $val->validated('open');
				$noodle->station = $val->validated('station');
				$noodle->image = $val->validated('image');
				$noodle->link = $val->validated('link');
				$noodle->tag = $val->validated('tag');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('noodle', $noodle, false);
		}

		$this->template->title = "Noodles";
		$this->template->content = View::forge('noodle/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('noodle');

		if ($noodle = Model_Noodle::find($id))
		{
			$noodle->delete();

			Session::set_flash('success', 'Deleted noodle #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete noodle #'.$id);
		}

		Response::redirect('noodle');

	}

}
