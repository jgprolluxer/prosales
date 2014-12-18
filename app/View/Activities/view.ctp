<div class="activities view">
<h2><?php echo __('Activity'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recurring'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['recurring']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recurring Freq'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['recurring_freq']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Planned Startdate'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['planned_startdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Planned Enddate'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['planned_enddate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Actual Startdate'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['actual_startdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Actual Enddate'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['actual_enddate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Owner'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['owner']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ObjectType'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['objectType']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ObjectId'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['objectId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('All Day'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['all_day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Auto Flg'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['auto_flg']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Act Plan Detail Id'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['act_plan_detail_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duration'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['duration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assigned User'); ?></dt>
		<dd>
			<?php echo h($activity['Activity']['assigned_user']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account'); ?></dt>
		<dd>
			<?php echo $this->Html->link($activity['Account']['alias'], array('controller' => 'accounts', 'action' => 'view', $activity['Account']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resource'); ?></dt>
		<dd>
			<?php echo $this->Html->link($activity['Resource']['name'], array('controller' => 'resources', 'action' => 'view', $activity['Resource']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Activity'), array('action' => 'edit', $activity['Activity']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Activity'), array('action' => 'delete', $activity['Activity']['id']), array(), __('Are you sure you want to delete # %s?', $activity['Activity']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
	</ul>
</div>
