<div class="actPlans view">
<h2><?php  echo __('Act Plan'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($actPlan['ActPlan']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($actPlan['ActPlan']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($actPlan['ActPlan']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($actPlan['ActPlan']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($actPlan['ActPlan']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($actPlan['ActPlan']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($actPlan['ActPlan']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($actPlan['ActPlan']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trigger Object'); ?></dt>
		<dd>
			<?php echo h($actPlan['ActPlan']['trigger_object']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trigger Event'); ?></dt>
		<dd>
			<?php echo h($actPlan['ActPlan']['trigger_event']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active Flg'); ?></dt>
		<dd>
			<?php echo h($actPlan['ActPlan']['active_flg']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Act Plan'), array('action' => 'edit', $actPlan['ActPlan']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Act Plan'), array('action' => 'delete', $actPlan['ActPlan']['id']), null, __('Are you sure you want to delete # %s?', $actPlan['ActPlan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Act Plans'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Act Plan'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Act Plan Details'), array('controller' => 'act_plan_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Act Plan Detail'), array('controller' => 'act_plan_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Act Plan Details'); ?></h3>
	<?php if (!empty($actPlan['ActPlanDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Act Plan Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Initial Status'); ?></th>
		<th><?php echo __('Order'); ?></th>
		<th><?php echo __('Trigger Event'); ?></th>
		<th><?php echo __('Button Name'); ?></th>
		<th><?php echo __('Fieldname 001'); ?></th>
		<th><?php echo __('Fieldvalue 001'); ?></th>
		<th><?php echo __('Fieldname 002'); ?></th>
		<th><?php echo __('Fieldvalue 002'); ?></th>
		<th><?php echo __('Fieldname 003'); ?></th>
		<th><?php echo __('Fieldvalue 003'); ?></th>
		<th><?php echo __('Fieldname 004'); ?></th>
		<th><?php echo __('Fieldvalue 004'); ?></th>
		<th><?php echo __('Fieldname 005'); ?></th>
		<th><?php echo __('Fieldvalue 005'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($actPlan['ActPlanDetail'] as $actPlanDetail): ?>
		<tr>
			<td><?php echo $actPlanDetail['id']; ?></td>
			<td><?php echo $actPlanDetail['act_plan_id']; ?></td>
			<td><?php echo $actPlanDetail['type']; ?></td>
			<td><?php echo $actPlanDetail['name']; ?></td>
			<td><?php echo $actPlanDetail['created']; ?></td>
			<td><?php echo $actPlanDetail['updated']; ?></td>
			<td><?php echo $actPlanDetail['created_by']; ?></td>
			<td><?php echo $actPlanDetail['updated_by']; ?></td>
			<td><?php echo $actPlanDetail['description']; ?></td>
			<td><?php echo $actPlanDetail['initial_status']; ?></td>
			<td><?php echo $actPlanDetail['order']; ?></td>
			<td><?php echo $actPlanDetail['trigger_event']; ?></td>
			<td><?php echo $actPlanDetail['button_name']; ?></td>
			<td><?php echo $actPlanDetail['fieldname_001']; ?></td>
			<td><?php echo $actPlanDetail['fieldvalue_001']; ?></td>
			<td><?php echo $actPlanDetail['fieldname_002']; ?></td>
			<td><?php echo $actPlanDetail['fieldvalue_002']; ?></td>
			<td><?php echo $actPlanDetail['fieldname_003']; ?></td>
			<td><?php echo $actPlanDetail['fieldvalue_003']; ?></td>
			<td><?php echo $actPlanDetail['fieldname_004']; ?></td>
			<td><?php echo $actPlanDetail['fieldvalue_004']; ?></td>
			<td><?php echo $actPlanDetail['fieldname_005']; ?></td>
			<td><?php echo $actPlanDetail['fieldvalue_005']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'act_plan_details', 'action' => 'view', $actPlanDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'act_plan_details', 'action' => 'edit', $actPlanDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'act_plan_details', 'action' => 'delete', $actPlanDetail['id']), null, __('Are you sure you want to delete # %s?', $actPlanDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Act Plan Detail'), array('controller' => 'act_plan_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
