<div class="addresses index">
	<h2><?php echo __('Addresses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('street'); ?></th>
			<th><?php echo $this->Paginator->sort('suburb'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('latitude'); ?></th>
			<th><?php echo $this->Paginator->sort('longitude'); ?></th>
			<th><?php echo $this->Paginator->sort('street_no'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($addresses as $address): ?>
	<tr>
		<td><?php echo h($address['Address']['id']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['created']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['updated']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['country']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['street']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['suburb']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['city']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['state']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['zip']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['latitude']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['longitude']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['street_no']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $address['Address']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $address['Address']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $address['Address']['id']), array(), __('Are you sure you want to delete # %s?', $address['Address']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?></li>
	</ul>
</div>
