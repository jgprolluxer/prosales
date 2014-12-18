<div class="notes view">
<h2><?php echo __('Note'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($note['Note']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($note['Note']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($note['Note']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($note['Note']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($note['Note']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($note['Note']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($note['Note']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ObjectType'); ?></dt>
		<dd>
			<?php echo h($note['Note']['objectType']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Objectid'); ?></dt>
		<dd>
			<?php echo h($note['Note']['objectid']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Note'), array('action' => 'edit', $note['Note']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Note'), array('action' => 'delete', $note['Note']['id']), array(), __('Are you sure you want to delete # %s?', $note['Note']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Notes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Note'), array('action' => 'add')); ?> </li>
	</ul>
</div>
