<?php
class Controller_Noodle extends Controller_Base
{
	protected $format = 'json';
	private $fields = array('name','prefecture','region','station','tag');

	public function before()
	{
		parent::before();
		if(!in_array(Request::active()->action,array('exlist','list','login','test')))
		{
			if(!Auth::check())
			{
				Session::set_flash('error','ログインしてください。');
				Response::redirect('noodle/login');
			}
		}
	}

	public function action_login()
	{
		Auth::check() and Response::redirect('noodle');	

		$data = array();
		$val = Validation::forge();
		if(Input::method() == 'POST')
		{
			$val->add('username','Username')->add_rule('required');
			$val->add('password','Password')->add_rule('required');
		
			if($val->run())
			{
				if(!Auth::check())
				{
					if(Auth::login(Input::post('username'),Input::post('password')))
					{
						Session::set_flash('success','ログインできました');
						Response::redirect('noodle');
					}
					else
					{
						$data['error'] = 'ログイン失敗しました。';
					}
				}
			}
			else
			{
				$data['error'] = 'username,passを入れてください。';
			}
		}
		$this->template->title = 'ログイン';
		$this->template->content = View::forge('noodle/login',$data);

	}

	public function action_logout()
	{
		Auth::logout();
		Session::set_flash('error','ログアウトしました。');
		Response::redirect('noodle/login');		
	}

	public function action_index()
	{
		#ページネーション
		$count = Model_Noodle::count();
		$config = array(
			'pagination_url' => Uri::base().'noodle/index',
			'uri_segment' => 3,
			'per_page' => 4,
			'total_items' => $count
		);
		$pagination = Pagination::forge('noodle_page',$config);
		$options = array(
			'limit' => $pagination->per_page,
			'offset' => $pagination->offset,
		);
		$data['noodles'] = Model_Noodle::find('all',$options);
		$this->template->title = "Noodles";
		$this->template->content = View::forge('noodle/index', $data);
		$this->template->content->set_safe('pagination',$pagination);

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
    
	/**
     * get_list() メソッドの機能追加版
     *
     * pagenationを実装
	 * $region 地域名
	 * $station 駅名
	 * $prefecture 都道府県
	 * $name 店名 
	 */
	public function	get_list()
	{
		#パラメータない場合
		if(!$count = count(Input::get())) return 'パラメータを入れてください';

		#パラメータの格納　nullの排除
		foreach($this->fields as $field)
		{
			$val = Input::get($field);
			if(empty($val)) continue;
			!is_null($val) and  $params[$field] = $val;
		}
		#queryの生成
		foreach($params as $key => $val)
		{
			$options['or_where'] []= array($key,'like','%'.$val.'%');
		}
		#合計の取得
		$total = Model_Noodle::query()->count();
		#カラムの設定
		$options['select'] = array('name','prefecture','region','address','tel','station','link','image','tag');

	        // ページング機能
	        (int)Input::get('limit') !== 0 ?$options['limit'] = Input::get('limit') : $options['limit'] = 60;
	        $options['offset'] = intval(Input::get('offset'));
	          // XXX: pageは0から始まるつもり。1から始まるなら $page に -1 をつける
	        //$options['offset'] = $page * $options['limit'];
		#ヘッダー設定
		header("Content-Type: application/json; charset=utf-8");

		#json dataの取e
		$json = Model_Noodle::find('all',$options);
		$json['total'] = $total;
		return $json;

	}	

	public function action_test()
	{
		$this->template->title = 'test';
		$this->template->content = View::forge('noodle/test');
	}
}

