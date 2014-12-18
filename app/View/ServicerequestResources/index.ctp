<div class="servicerequestResources index">
	<h2><?php echo __('Servicerequest Resources'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('servicerequest_id'); ?></th>
			<th><?php echo $this->Paginator->sort('resource_id'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($servicerequestResources as $servicerequestResource): ?>
	<tr>
		<td><?php echo h($servicerequestResource['ServicerequestResource']['id']); ?>&nbsp;</td>
		<td><?php echo h($servicerequestResource['ServicerequestResource']['created']); ?>&nbsp;</td>
		<td><?php echo h($servicerequestResource['ServicerequestResource']['updated']); ?>&nbsp;</td>
		<td><?php echo h($servicerequestResource['ServicerequestResource']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($servicerequestResource['ServicerequestResource']['updated_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($servicerequestResource['Servicerequest']['name'], array('controller' => 'servicerequests', 'action' => 'view', $servicerequestResource['Servicerequest']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($servicerequestResource['Resource']['name'], array('controller' => 'resources', 'action' => 'view', $servicerequestResource['Resource']['id'])); ?>
		</td>
		<td><?php echo h($servicerequestResource['ServicerequestResource']['description']); ?>&nbsp;</td>
		<td><?php echo h($servicerequestResource['ServicerequestResource']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $servicerequestResource['ServicerequestResource']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $servicerequestResource['ServicerequestResource']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $servicerequestResource['ServicerequestResource']['id']), null, __('Are you sure you want to delete # %s?', $servicerequestResource['ServicerequestResource']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
		<li><?php echo $this->Html->link(__('New Servicerequest Resource'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Servicerequests'), array('controller' => 'servicerequests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Servicerequest'), array('controller' => 'servicerequests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
	</ul>
</div>
