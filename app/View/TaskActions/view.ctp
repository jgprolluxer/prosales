<div class="taskActions view">
<h2><?php  echo __('Task Action'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($taskAction['TaskAction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task'); ?></dt>
		<dd>
			<?php echo $this->Html->link($taskAction['Task']['name'], array('controller' => 'tasks', 'action' => 'view', $taskAction['Task']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($taskAction['TaskAction']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($taskAction['TaskAction']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($taskAction['TaskAction']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($taskAction['TaskAction']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($taskAction['TaskAction']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tip'); ?></dt>
		<dd>
			<?php echo h($taskAction['TaskAction']['tip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Color'); ?></dt>
		<dd>
			<?php echo h($taskAction['TaskAction']['color']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text'); ?></dt>
		<dd>
			<?php echo h($taskAction['TaskAction']['text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($taskAction['TaskAction']['action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controller'); ?></dt>
		<dd>
			<?php echo h($taskAction['TaskAction']['controller']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Task Action'), array('action' => 'edit', $taskAction['TaskAction']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Task Action'), array('action' => 'delete', $taskAction['TaskAction']['id']), null, __('Are you sure you want to delete # %s?', $taskAction['TaskAction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Task Actions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task Action'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
