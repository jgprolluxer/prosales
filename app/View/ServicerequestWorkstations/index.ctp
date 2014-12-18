<div class="servicerequestWorkstations index">
	<h2><?php echo __('Servicerequest Workstations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('servicerequest_id'); ?></th>
			<th><?php echo $this->Paginator->sort('workstation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($servicerequestWorkstations as $servicerequestWorkstation): ?>
	<tr>
		<td><?php echo h($servicerequestWorkstation['ServicerequestWorkstation']['id']); ?>&nbsp;</td>
		<td><?php echo h($servicerequestWorkstation['ServicerequestWorkstation']['created']); ?>&nbsp;</td>
		<td><?php echo h($servicerequestWorkstation['ServicerequestWorkstation']['updated']); ?>&nbsp;</td>
		<td><?php echo h($servicerequestWorkstation['ServicerequestWorkstation']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($servicerequestWorkstation['ServicerequestWorkstation']['updated_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($servicerequestWorkstation['Servicerequest']['name'], array('controller' => 'servicerequests', 'action' => 'view', $servicerequestWorkstation['Servicerequest']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($servicerequestWorkstation['Workstation']['title'], array('controller' => 'workstations', 'action' => 'view', $servicerequestWorkstation['Workstation']['id'])); ?>
		</td>
		<td><?php echo h($servicerequestWorkstation['ServicerequestWorkstation']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $servicerequestWorkstation['ServicerequestWorkstation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $servicerequestWorkstation['ServicerequestWorkstation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $servicerequestWorkstation['ServicerequestWorkstation']['id']), null, __('Are you sure you want to delete # %s?', $servicerequestWorkstation['ServicerequestWorkstation']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Servicerequest Workstation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Servicerequests'), array('controller' => 'servicerequests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Servicerequest'), array('controller' => 'servicerequests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workstations'), array('controller' => 'workstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workstation'), array('controller' => 'workstations', 'action' => 'add')); ?> </li>
	</ul>
</div>
