<div class="storeTeams index">
	<h2><?php echo __('Store Teams'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('store_id'); ?></th>
			<th><?php echo $this->Paginator->sort('team_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($storeTeams as $storeTeam): ?>
	<tr>
		<td><?php echo h($storeTeam['StoreTeam']['id']); ?>&nbsp;</td>
		<td><?php echo h($storeTeam['StoreTeam']['created']); ?>&nbsp;</td>
		<td><?php echo h($storeTeam['StoreTeam']['updated']); ?>&nbsp;</td>
		<td><?php echo h($storeTeam['StoreTeam']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($storeTeam['StoreTeam']['updated_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($storeTeam['Store']['name'], array('controller' => 'stores', 'action' => 'view', $storeTeam['Store']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($storeTeam['Team']['name'], array('controller' => 'teams', 'action' => 'view', $storeTeam['Team']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $storeTeam['StoreTeam']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $storeTeam['StoreTeam']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $storeTeam['StoreTeam']['id']), array(), __('Are you sure you want to delete # %s?', $storeTeam['StoreTeam']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Store Team'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
