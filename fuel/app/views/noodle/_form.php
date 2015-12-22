<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($noodle) ? $noodle->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Prefecture', 'prefecture', array('class'=>'control-label')); ?>

				<?php echo Form::input('prefecture', Input::post('prefecture', isset($noodle) ? $noodle->prefecture : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Prefecture')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Region', 'region', array('class'=>'control-label')); ?>

				<?php echo Form::input('region', Input::post('region', isset($noodle) ? $noodle->region : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Region')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Address', 'address', array('class'=>'control-label')); ?>

				<?php echo Form::input('address', Input::post('address', isset($noodle) ? $noodle->address : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Address')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Tel', 'tel', array('class'=>'control-label')); ?>

				<?php echo Form::input('tel', Input::post('tel', isset($noodle) ? $noodle->tel : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Tel')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Open', 'open', array('class'=>'control-label')); ?>

				<?php echo Form::input('open', Input::post('open', isset($noodle) ? $noodle->open : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Open')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Station', 'station', array('class'=>'control-label')); ?>

				<?php echo Form::input('station', Input::post('station', isset($noodle) ? $noodle->station : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Station')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Image', 'image', array('class'=>'control-label')); ?>

				<?php echo Form::input('image', Input::post('image', isset($noodle) ? $noodle->image : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Image')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Link', 'link', array('class'=>'control-label')); ?>

				<?php echo Form::input('link', Input::post('link', isset($noodle) ? $noodle->link : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Link')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Tag', 'tag', array('class'=>'control-label')); ?>

				<?php echo Form::input('tag', Input::post('tag', isset($noodle) ? $noodle->tag : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Tag')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>