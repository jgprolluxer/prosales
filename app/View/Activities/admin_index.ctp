<div class="activities index">
	<h2><?php echo __('Activities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('recurring'); ?></th>
			<th><?php echo $this->Paginator->sort('recurring_freq'); ?></th>
			<th><?php echo $this->Paginator->sort('planned_startdate'); ?></th>
			<th><?php echo $this->Paginator->sort('planned_enddate'); ?></th>
			<th><?php echo $this->Paginator->sort('actual_startdate'); ?></th>
			<th><?php echo $this->Paginator->sort('actual_enddate'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('owner'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('objectType'); ?></th>
			<th><?php echo $this->Paginator->sort('objectId'); ?></th>
			<th><?php echo $this->Paginator->sort('all_day'); ?></th>
			<th><?php echo $this->Paginator->sort('auto_flg'); ?></th>
			<th><?php echo $this->Paginator->sort('act_plan_detail_id'); ?></th>
			<th><?php echo $this->Paginator->sort('duration'); ?></th>
			<th><?php echo $this->Paginator->sort('assigned_user'); ?></th>
			<th><?php echo $this->Paginator->sort('account_id'); ?></th>
			<th><?php echo $this->Paginator->sort('resource_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($activities as $activity): ?>
	<tr>
		<td><?php echo h($activity['Activity']['id']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['type']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['name']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['status']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['recurring']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['recurring_freq']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['planned_startdate']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['planned_enddate']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['actual_startdate']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['actual_enddate']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['created']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['updated']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['owner']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['description']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['objectType']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['objectId']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['all_day']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['auto_flg']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['act_plan_detail_id']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['duration']); ?>&nbsp;</td>
		<td><?php echo h($activity['Activity']['assigned_user']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($activity['Account']['alias'], array('controller' => 'accounts', 'action' => 'view', $activity['Account']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($activity['Resource']['name'], array('controller' => 'resources', 'action' => 'view', $activity['Resource']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $activity['Activity']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $activity['Activity']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $activity['Activity']['id']), array(), __('Are you sure you want to delete # %s?', $activity['Activity']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Activity'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
	</ul>
</div>
