<div class="pricelists view">
<h2><?php echo __('Pricelist'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pricelist['Pricelist']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($pricelist['Pricelist']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($pricelist['Pricelist']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($pricelist['Pricelist']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($pricelist['Pricelist']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($pricelist['Pricelist']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($pricelist['Pricelist']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Currency'); ?></dt>
		<dd>
			<?php echo h($pricelist['Pricelist']['currency']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Currency Symbol'); ?></dt>
		<dd>
			<?php echo h($pricelist['Pricelist']['currency_symbol']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax'); ?></dt>
		<dd>
			<?php echo h($pricelist['Pricelist']['tax']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pricelist'), array('action' => 'edit', $pricelist['Pricelist']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pricelist'), array('action' => 'delete', $pricelist['Pricelist']['id']), array(), __('Are you sure you want to delete # %s?', $pricelist['Pricelist']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pricelists'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pricelist'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pricelist Products'), array('controller' => 'pricelist_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pricelist Product'), array('controller' => 'pricelist_products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Pricelist Products'); ?></h3>
	<?php if (!empty($pricelist['PricelistProduct'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Pricelist Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Unit Price'); ?></th>
		<th><?php echo __('Tax'); ?></th>
		<th><?php echo __('Priceinpoints'); ?></th>
		<th><?php echo __('Startdt'); ?></th>
		<th><?php echo __('Enddt'); ?></th>
		<th><?php echo __('Disc Percent'); ?></th>
		<th><?php echo __('Disc Startdt'); ?></th>
		<th><?php echo __('Disc Enddt'); ?></th>
		<th><?php echo __('Maxdisc Percent'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pricelist['PricelistProduct'] as $pricelistProduct): ?>
		<tr>
			<td><?php echo $pricelistProduct['id']; ?></td>
			<td><?php echo $pricelistProduct['created']; ?></td>
			<td><?php echo $pricelistProduct['updated']; ?></td>
			<td><?php echo $pricelistProduct['updated_by']; ?></td>
			<td><?php echo $pricelistProduct['created_by']; ?></td>
			<td><?php echo $pricelistProduct['pricelist_id']; ?></td>
			<td><?php echo $pricelistProduct['product_id']; ?></td>
			<td><?php echo $pricelistProduct['unit_price']; ?></td>
			<td><?php echo $pricelistProduct['tax']; ?></td>
			<td><?php echo $pricelistProduct['priceinpoints']; ?></td>
			<td><?php echo $pricelistProduct['startdt']; ?></td>
			<td><?php echo $pricelistProduct['enddt']; ?></td>
			<td><?php echo $pricelistProduct['disc_percent']; ?></td>
			<td><?php echo $pricelistProduct['disc_startdt']; ?></td>
			<td><?php echo $pricelistProduct['disc_enddt']; ?></td>
			<td><?php echo $pricelistProduct['maxdisc_percent']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pricelist_products', 'action' => 'view', $pricelistProduct['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pricelist_products', 'action' => 'edit', $pricelistProduct['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pricelist_products', 'action' => 'delete', $pricelistProduct['id']), array(), __('Are you sure you want to delete # %s?', $pricelistProduct['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pricelist Product'), array('controller' => 'pricelist_products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Teams'); ?></h3>
	<?php if (!empty($pricelist['Team'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Workstation Id'); ?></th>
		<th><?php echo __('Alias'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pricelist['Team'] as $team): ?>
		<tr>
			<td><?php echo $team['id']; ?></td>
			<td><?php echo $team['created_by']; ?></td>
			<td><?php echo $team['updated_by']; ?></td>
			<td><?php echo $team['updated']; ?></td>
			<td><?php echo $team['created']; ?></td>
			<td><?php echo $team['name']; ?></td>
			<td><?php echo $team['workstation_id']; ?></td>
			<td><?php echo $team['alias']; ?></td>
			<td><?php echo $team['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'teams', 'action' => 'view', $team['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'teams', 'action' => 'edit', $team['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'teams', 'action' => 'delete', $team['id']), array(), __('Are you sure you want to delete # %s?', $team['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
