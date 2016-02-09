<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
$(function(){
				$('#form_submit').on('click',function(){
					$('#result').empty();
					var param = $('#test-form').serializeArray();
					$.ajax({
						type: 'get',
						url: "<?php echo Uri::create('noodle/list');?>",
						data: param 
					}).done(function(data){
						if(data.info.length === 0) {
							$('<p>').append('結果無し').appendTo($('#result'));
							return false;
						}
						$.each(data.info,function(index,d){
							$('<li>').addClass('list-group').append(d.name+''+d.prefecture+''+d.region+''+d.address+'電話:'+d.tel+''+d.station).appendTo($('#result'));
						});
					});
				});
})
</script>
<p>ラーメン店舗情報の一覧を表示するJSONデータです。</p>
<div class="table-responsive">
<h3>サービス仕様</h3>
<ul class="list-unstyled">
<li>店舗一覧取得例:<code>http://133.130.106.164/Tech-Noodle-Api/public/noodle/list?prefecture=東京&name=東京</code></li>
<li>
<table class="table table-hover table-bordered">
<tr>
<th>パラメータ</th>
<th>説明</th>
</tr>
<tr>
<td>name</td>
<td>店舗名</td>
</tr>
<tr>
<td>prefecture</td>
<td>都道府県</td>
</tr>
<tr>
<td>region</td>
<td>市区村町</td>
</tr>
<tr>
<td>station</td>
<td>駅名</td>
</tr>
<tr>
<td>limit</td>
<td>件数(デフォルト:60,任意)</td>
</tr>
<tr>
<td>offset</td>
<td>何ページ目から始まる(デフォルト：0は一ページ目,任意)</td>
</tr>
</table>
<li class="text text-danger">※JSONに条件の全件数と指定件数の店舗情報を格納してます。</li>
</li>
<li>特定の店舗口コミ取得例:<code>http://133.130.106.164/Tech-Noodle-Api/public/review/review?id=[shop_id]</code></li>
<li>特定の店舗に口コミ投稿例:<code>http://133.130.106.164/Tech-Noodle-Api/public/review/create</code></li>
<li class="text text-danger">※以下のパラメータすべて必須です。</li>
<li class="text text-warning">※フォームから投稿用のurlにpost送信</li>
<li>
<table class="table table-hover table-bordered">
<tr>
<th>パラメータ</th>
<th>説明</th>
</tr>
<tr>
<td>user_name</td>
<td>ユーザー名</td>
</tr>
<tr>
<td>review</td>
<td>口コミ</td>
</tr>
<tr>
<td>shop_id</td>
<td>店舗ＩＤ(数字のみ)</td>
</tr>
<tr>
<td>rank</td>
<td>ランキング(数字のみ)</td>
</tr>
</table>
</li>
</ul>
</div>
<h4 class="alert alert-success">test form</h4>
<?php echo Form::open(array('id'=>'test-form','class'=>'form-horizontal'));?>
<div class="form-group">
<?php echo Form::input('name',null,array('class'=>'form-control','placeholder'=>'店名'))?>
</div>
<div class="form-group">
<?php echo Form::input('prefecture',null,array('class'=>'form-control','placeholder'=>'都道府県'))?>
</div>
<div class="form-group">
<?php echo Form::input('region',null,array('class'=>'form-control','placeholder'=>'市町村'))?>
</div>
<div class="form-group">
<?php echo Form::input('station',null,array('class'=>'form-control','placeholder'=>'駅名'))?>
</div>
<?php echo Form::input('submit','検索',array('class'=>'btn btn-info','type'=>'button'))?>

<?php echo Form::close();?>
<div>
<ul class="list-unstyled" id="result">
</ul>
</div>
