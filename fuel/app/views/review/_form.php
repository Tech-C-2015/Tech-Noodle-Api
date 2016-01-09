<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('User name', 'user_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_name', Input::post('user_name', isset($review) ? $review->user_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Review', 'review', array('class'=>'control-label')); ?>

				<?php echo Form::input('review', Input::post('review', isset($review) ? $review->review : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Review')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Shop id', 'shop_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('shop_id', Input::post('shop_id', isset($review) ? $review->shop_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Shop id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>