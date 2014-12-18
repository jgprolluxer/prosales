<div class="payments view">
<h2><?php echo __('Payment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Folio'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['folio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Due Amount'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['due_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Due Days'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['due_days']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account'); ?></dt>
		<dd>
			<?php echo $this->Html->link($payment['Account']['alias'], array('controller' => 'accounts', 'action' => 'view', $payment['Account']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Due Date'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['due_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['amount']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Payment'), array('action' => 'edit', $payment['Payment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Payment'), array('action' => 'delete', $payment['Payment']['id']), array(), __('Are you sure you want to delete # %s?', $payment['Payment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
	</ul>
</div>
