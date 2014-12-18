<div class="reports view">
<h2><?php echo __('Report'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($report['Report']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($report['Report']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($report['Report']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($report['Report']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($report['Report']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($report['Report']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rkey'); ?></dt>
		<dd>
			<?php echo h($report['Report']['rkey']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($report['Report']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($report['Report']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ModelName'); ?></dt>
		<dd>
			<?php echo h($report['Report']['modelName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FindType'); ?></dt>
		<dd>
			<?php echo h($report['Report']['findType']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recursive'); ?></dt>
		<dd>
			<?php echo h($report['Report']['recursive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Report'), array('action' => 'edit', $report['Report']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Report'), array('action' => 'delete', $report['Report']['id']), array(), __('Are you sure you want to delete # %s?', $report['Report']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('action' => 'add')); ?> </li>
	</ul>
</div>
