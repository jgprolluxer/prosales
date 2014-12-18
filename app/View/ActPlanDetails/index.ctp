<div class="actPlanDetails index">
	<h2><?php echo __('Act Plan Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('act_plan_id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('initial_status'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th><?php echo $this->Paginator->sort('trigger_event'); ?></th>
			<th><?php echo $this->Paginator->sort('button_name'); ?></th>
			<th><?php echo $this->Paginator->sort('fieldname_001'); ?></th>
			<th><?php echo $this->Paginator->sort('fieldvalue_001'); ?></th>
			<th><?php echo $this->Paginator->sort('fieldname_002'); ?></th>
			<th><?php echo $this->Paginator->sort('fieldvalue_002'); ?></th>
			<th><?php echo $this->Paginator->sort('fieldname_003'); ?></th>
			<th><?php echo $this->Paginator->sort('fieldvalue_003'); ?></th>
			<th><?php echo $this->Paginator->sort('fieldname_004'); ?></th>
			<th><?php echo $this->Paginator->sort('fieldvalue_004'); ?></th>
			<th><?php echo $this->Paginator->sort('fieldname_005'); ?></th>
			<th><?php echo $this->Paginator->sort('fieldvalue_005'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($actPlanDetails as $actPlanDetail): ?>
	<tr>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($actPlanDetail['ActPlan']['name'], array('controller' => 'act_plans', 'action' => 'view', $actPlanDetail['ActPlan']['id'])); ?>
		</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['type']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['name']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['created']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['updated']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['description']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['initial_status']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['order']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['trigger_event']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['button_name']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['fieldname_001']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['fieldvalue_001']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['fieldname_002']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['fieldvalue_002']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['fieldname_003']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['fieldvalue_003']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['fieldname_004']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['fieldvalue_004']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['fieldname_005']); ?>&nbsp;</td>
		<td><?php echo h($actPlanDetail['ActPlanDetail']['fieldvalue_005']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $actPlanDetail['ActPlanDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $actPlanDetail['ActPlanDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $actPlanDetail['ActPlanDetail']['id']), null, __('Are you sure you want to delete # %s?', $actPlanDetail['ActPlanDetail']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Act Plan Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Act Plans'), array('controller' => 'act_plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Act Plan'), array('controller' => 'act_plans', 'action' => 'add')); ?> </li>
	</ul>
</div>
