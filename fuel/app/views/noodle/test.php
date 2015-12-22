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
						if(!data) {
							$('<p>').append('結果無し').appendTo($('#result'));
							return false;
						}
						$.each(data,function(index,d){
							$('<li>').addClass('list-group').append(d.name+''+d.prefecture+''+d.region+''+d.address+'電話:'+d.tel+''+d.station).appendTo($('#result'));
						});
					});
				});
})
</script>
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
