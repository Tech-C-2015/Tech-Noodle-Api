<?php
class Controller_Review extends Controller_Base
{	
	public function before()
	{
		parent::before();
		if(!in_array(Request::active()->action,array('create','review')))
		{
			if(!Auth::check())
			{
				Session::set_flash('error','ログインしてください。');
				Response::redirect('noodle/login');
			}
		}
	}

	public function action_index()
	{
		$data['reviews'] = Model_Review::find('all');
		$this->template->title = "Reviews";
		$this->template->content = View::forge('review/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('review');

		if ( ! $data['review'] = Model_Review::find($id))
		{
			Session::set_flash('error', 'Could not find review #'.$id);
			Response::redirect('review');
		}

		$this->template->title = "Review";
		$this->template->content = View::forge('review/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Review::validate('create');

			if ($val->run())
			{
				$review = Model_Review::forge(array(
					'user_name' => Input::post('user_name'),
					'review' => Input::post('review'),
					'shop_id' => Input::post('shop_id'),
					'rank' => Input::post('rank'),
				));

				if ($review and $review->save())
				{
					Session::set_flash('success', 'Added review #'.$review->id.'.');

					Response::redirect('review');
				}

				else
				{
					Session::set_flash('error', 'Could not save review.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Reviews";
		$this->template->content = View::forge('review/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('review');

		if ( ! $review = Model_Review::find($id))
		{
			Session::set_flash('error', 'Could not find review #'.$id);
			Response::redirect('review');
		}

		$val = Model_Review::validate('edit');

		if ($val->run())
		{
			$review->user_name = Input::post('user_name');
			$review->review = Input::post('review');
			$review->shop_id = Input::post('shop_id');
			$review->rank = Input::post('rank');

			if ($review->save())
			{
				Session::set_flash('success', 'Updated review #' . $id);

				Response::redirect('review');
			}

			else
			{
				Session::set_flash('error', 'Could not update review #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$review->user_name = $val->validated('user_name');
				$review->review = $val->validated('review');
				$review->shop_id = $val->validated('shop_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('review', $review, false);
		}

		$this->template->title = "Reviews";
		$this->template->content = View::forge('review/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('review');

		if ($review = Model_Review::find($id))
		{
			$review->delete();

			Session::set_flash('success', 'Deleted review #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete review #'.$id);
		}

		Response::redirect('review');

	}
	public function get_review()
	{
		if(!$count = count(Input::get())) return 'パラメーターを入れてください';
		$shop_id = Input::get('shop_id');
		$options = array('where' => array('shop_id' => $shop_id));
		$reviews = Model_Review::find('all', $options);
		header("Content-Type: application/json; charset=utf-8");
		return $reviews;
	}

}
