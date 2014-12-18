<div class="invoices view">
<h2><?php  echo __('Invoice'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Docnum'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['docnum']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Invoice Date'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['invoice_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Due Date'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['due_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Amt'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['total_amt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subtotal Amt'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['subtotal_amt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax Amt'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['tax_amt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax'); ?></dt>
		<dd>
			<?php echo h($invoice['Invoice']['tax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account'); ?></dt>
		<dd>
			<?php echo $this->Html->link($invoice['Account']['name'], array('controller' => 'accounts', 'action' => 'view', $invoice['Account']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($invoice['Order']['name'], array('controller' => 'orders', 'action' => 'view', $invoice['Order']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Invoice'), array('action' => 'edit', $invoice['Invoice']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Invoice'), array('action' => 'delete', $invoice['Invoice']['id']), null, __('Are you sure you want to delete # %s?', $invoice['Invoice']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Invoices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invoice'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Po Entries'), array('controller' => 'po_entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Po Entry'), array('controller' => 'po_entries', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Po Entries'); ?></h3>
	<?php if (!empty($invoice['PoEntry'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Qty'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Invoice Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($invoice['PoEntry'] as $poEntry): ?>
		<tr>
			<td><?php echo $poEntry['id']; ?></td>
			<td><?php echo $poEntry['created']; ?></td>
			<td><?php echo $poEntry['updated']; ?></td>
			<td><?php echo $poEntry['created_by']; ?></td>
			<td><?php echo $poEntry['updated_by']; ?></td>
			<td><?php echo $poEntry['order_id']; ?></td>
			<td><?php echo $poEntry['qty']; ?></td>
			<td><?php echo $poEntry['amount']; ?></td>
			<td><?php echo $poEntry['description']; ?></td>
			<td><?php echo $poEntry['invoice_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'po_entries', 'action' => 'view', $poEntry['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'po_entries', 'action' => 'edit', $poEntry['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'po_entries', 'action' => 'delete', $poEntry['id']), null, __('Are you sure you want to delete # %s?', $poEntry['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Po Entry'), array('controller' => 'po_entries', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
