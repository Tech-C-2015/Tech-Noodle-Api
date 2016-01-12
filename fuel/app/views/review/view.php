<h2>Viewing <span class='muted'>#<?php echo $review->id; ?></span></h2>

<p>
	<strong>User name:</strong>
	<?php echo $review->user_name; ?></p>
<p>
	<strong>Review:</strong>
	<?php echo $review->review; ?></p>
<p>
	<strong>Shop id:</strong>
	<?php echo $review->shop_id; ?></p>
<p>
	<strong>Rank:</strong>
	<?php echo $review->rank; ?></p>

<?php echo Html::anchor('review/edit/'.$review->id, 'Edit'); ?> |
<?php echo Html::anchor('review', 'Back'); ?>