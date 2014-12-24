<div class="families view">
<h2><?php echo __('Family'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($family['Family']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($family['Family']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($family['Family']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($family['Family']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($family['Family']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($family['Family']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($family['Family']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Picture'); ?></dt>
		<dd>
			<?php echo h($family['Family']['picture']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Color'); ?></dt>
		<dd>
			<?php echo h($family['Family']['color']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Family'), array('action' => 'edit', $family['Family']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Family'), array('action' => 'delete', $family['Family']['id']), array(), __('Are you sure you want to delete # %s?', $family['Family']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Families'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Family'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($family['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Integration Num'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Active Flg'); ?></th>
		<th><?php echo __('Uom'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Unit Price'); ?></th>
		<th><?php echo __('Stock'); ?></th>
		<th><?php echo __('Track Stock Flg'); ?></th>
		<th><?php echo __('Short Desc'); ?></th>
		<th><?php echo __('Long Desc'); ?></th>
		<th><?php echo __('Part Number'); ?></th>
		<th><?php echo __('Family Id'); ?></th>
		<th><?php echo __('Product Type'); ?></th>
		<th><?php echo __('Picture'); ?></th>
		<th><?php echo __('Color'); ?></th>
		<th><?php echo __('Bundle Flg'); ?></th>
		<th><?php echo __('Track Refund Flg'); ?></th>
		<th><?php echo __('Supply Type'); ?></th>
		<th><?php echo __('Resourcetype'); ?></th>
		<th><?php echo __('Schedulable'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($family['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['integration_num']; ?></td>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo $product['created']; ?></td>
			<td><?php echo $product['updated']; ?></td>
			<td><?php echo $product['created_by']; ?></td>
			<td><?php echo $product['updated_by']; ?></td>
			<td><?php echo $product['active_flg']; ?></td>
			<td><?php echo $product['uom']; ?></td>
			<td><?php echo $product['status']; ?></td>
			<td><?php echo $product['unit_price']; ?></td>
			<td><?php echo $product['stock']; ?></td>
			<td><?php echo $product['track_stock_flg']; ?></td>
			<td><?php echo $product['short_desc']; ?></td>
			<td><?php echo $product['long_desc']; ?></td>
			<td><?php echo $product['part_number']; ?></td>
			<td><?php echo $product['family_id']; ?></td>
			<td><?php echo $product['product_type']; ?></td>
			<td><?php echo $product['picture']; ?></td>
			<td><?php echo $product['color']; ?></td>
			<td><?php echo $product['bundle_flg']; ?></td>
			<td><?php echo $product['track_refund_flg']; ?></td>
			<td><?php echo $product['supply_type']; ?></td>
			<td><?php echo $product['resourcetype']; ?></td>
			<td><?php echo $product['schedulable']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), array(), __('Are you sure you want to delete # %s?', $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
