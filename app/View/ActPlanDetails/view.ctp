<div class="actPlanDetails view">
<h2><?php  echo __('Act Plan Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Act Plan'); ?></dt>
		<dd>
			<?php echo $this->Html->link($actPlanDetail['ActPlan']['name'], array('controller' => 'act_plans', 'action' => 'view', $actPlanDetail['ActPlan']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Initial Status'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['initial_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trigger Event'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['trigger_event']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Button Name'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['button_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fieldname 001'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['fieldname_001']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fieldvalue 001'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['fieldvalue_001']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fieldname 002'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['fieldname_002']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fieldvalue 002'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['fieldvalue_002']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fieldname 003'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['fieldname_003']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fieldvalue 003'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['fieldvalue_003']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fieldname 004'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['fieldname_004']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fieldvalue 004'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['fieldvalue_004']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fieldname 005'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['fieldname_005']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fieldvalue 005'); ?></dt>
		<dd>
			<?php echo h($actPlanDetail['ActPlanDetail']['fieldvalue_005']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Act Plan Detail'), array('action' => 'edit', $actPlanDetail['ActPlanDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Act Plan Detail'), array('action' => 'delete', $actPlanDetail['ActPlanDetail']['id']), null, __('Are you sure you want to delete # %s?', $actPlanDetail['ActPlanDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Act Plan Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Act Plan Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Act Plans'), array('controller' => 'act_plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Act Plan'), array('controller' => 'act_plans', 'action' => 'add')); ?> </li>
	</ul>
</div>
