<div class="attachments view">
<h2><?php echo __('Attachment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filedoc'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['filedoc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attachment'), array('action' => 'edit', $attachment['Attachment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attachment'), array('action' => 'delete', $attachment['Attachment']['id']), array(), __('Are you sure you want to delete # %s?', $attachment['Attachment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('action' => 'add')); ?> </li>
	</ul>
</div>
