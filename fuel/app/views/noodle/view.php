<h2>Viewing <span class='muted'>#<?php echo $noodle->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $noodle->name; ?></p>
<p>
	<strong>Prefecture:</strong>
	<?php echo $noodle->prefecture; ?></p>
<p>
	<strong>Region:</strong>
	<?php echo $noodle->region; ?></p>
<p>
	<strong>Address:</strong>
	<?php echo $noodle->address; ?></p>
<p>
	<strong>Tel:</strong>
	<?php echo $noodle->tel; ?></p>
<p>
	<strong>Open:</strong>
	<?php echo $noodle->open; ?></p>
<p>
	<strong>Station:</strong>
	<?php echo $noodle->station; ?></p>
<p>
	<strong>Image:</strong>
	<?php echo $noodle->image; ?></p>
<p>
	<strong>Link:</strong>
	<?php echo $noodle->link; ?></p>
<p>
	<strong>Tag:</strong>
	<?php echo $noodle->tag; ?></p>

<?php echo Html::anchor('noodle/edit/'.$noodle->id, 'Edit'); ?> |
<?php echo Html::anchor('noodle', 'Back'); ?>