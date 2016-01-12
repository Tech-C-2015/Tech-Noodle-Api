<h2>Listing <span class='muted'>Reviews</span></h2>
<br>
<?php if ($reviews): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User name</th>
			<th>Review</th>
			<th>Shop id</th>
			<th>Rank</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($reviews as $item): ?>		<tr>

			<td><?php echo $item->user_name; ?></td>
			<td><?php echo $item->review; ?></td>
			<td><?php echo $item->shop_id; ?></td>
			<td><?php echo $item->rank; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('review/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('review/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('review/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Reviews.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('review/create', 'Add new Review', array('class' => 'btn btn-success')); ?>

</p>
