<div class="mails view">
<h2><?php  echo __('Mail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mail['Mail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($mail['Mail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($mail['Mail']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($mail['Mail']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($mail['Mail']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail From'); ?></dt>
		<dd>
			<?php echo h($mail['Mail']['mail_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail To'); ?></dt>
		<dd>
			<?php echo h($mail['Mail']['mail_to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo h($mail['Mail']['subject']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail Body'); ?></dt>
		<dd>
			<?php echo h($mail['Mail']['mail_body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail To Cc'); ?></dt>
		<dd>
			<?php echo h($mail['Mail']['mail_to_cc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment'); ?></dt>
		<dd>
			<?php echo h($mail['Mail']['attachment']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mail'), array('action' => 'edit', $mail['Mail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mail'), array('action' => 'delete', $mail['Mail']['id']), null, __('Are you sure you want to delete # %s?', $mail['Mail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mails'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mail'), array('action' => 'add')); ?> </li>
	</ul>
</div>
