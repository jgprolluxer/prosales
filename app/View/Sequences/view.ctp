<div class="sequences view">
<h2><?php  echo __('Sequence'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sequence['Sequence']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($sequence['Sequence']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($sequence['Sequence']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sequence'), array('action' => 'edit', $sequence['Sequence']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sequence'), array('action' => 'delete', $sequence['Sequence']['id']), null, __('Are you sure you want to delete # %s?', $sequence['Sequence']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sequences'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sequence'), array('action' => 'add')); ?> </li>
	</ul>
</div>
