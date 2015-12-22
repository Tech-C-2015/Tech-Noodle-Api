<?php if(isset($error)):?>
<p class="alert alert-danger"><?php echo $error;?></p>
<?php endif;?>

<?php echo Form::open(array('class' => 'form-horizontal'));?>

<div class="form-group">
<?php echo Form::input('username',null,array('class'=>'form-control','placeholder'=>'username'));?>
</div>

<div class="form-group">
<?php echo Form::input('password',null,array('class'=>'form-control','type'=>'password','placeholder'=>'password'));?>
</div>

<div class="form-group">
<?php echo Form::submit('submit','ログイン',array('class'=>'form-control','class'=>'btn btn-primary'));?>
</div>
<?php echo Form::close();?>
