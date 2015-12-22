<h2>Listing <span class='muted'>Noodles</span></h2>
<br>
<?php if ($noodles): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Prefecture</th>
			<th>Region</th>
			<th>Address</th>
			<th>Tel</th>
			<th>Open</th>
			<th>Station</th>
			<th>Image</th>
			<th>Link</th>
			<th>Tag</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($noodles as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->prefecture; ?></td>
			<td><?php echo $item->region; ?></td>
			<td><?php echo $item->address; ?></td>
			<td><?php echo $item->tel; ?></td>
			<td><?php echo $item->open; ?></td>
			<td><?php echo $item->station; ?></td>
			<td><?php echo $item->image; ?></td>
			<td><?php echo $item->link; ?></td>
			<td><?php echo $item->tag; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('noodle/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('noodle/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('noodle/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Noodles.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('noodle/create', 'Add new Noodle', array('class' => 'btn btn-success')); ?>

</p>
