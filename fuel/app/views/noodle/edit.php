<h2>Editing <span class='muted'>Noodle</span></h2>
<br>

<?php echo render('noodle/_form'); ?>
<p>
	<?php echo Html::anchor('noodle/view/'.$noodle->id, 'View'); ?> |
	<?php echo Html::anchor('noodle', 'Back'); ?></p>
