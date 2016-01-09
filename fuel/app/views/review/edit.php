<h2>Editing <span class='muted'>Review</span></h2>
<br>

<?php echo render('review/_form'); ?>
<p>
	<?php echo Html::anchor('review/view/'.$review->id, 'View'); ?> |
	<?php echo Html::anchor('review', 'Back'); ?></p>
