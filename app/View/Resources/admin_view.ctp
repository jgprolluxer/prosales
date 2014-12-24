<div class="resources view">
<h2><?php echo __('Resource'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['class']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub Type'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['sub_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resource'), array('action' => 'edit', $resource['Resource']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Resource'), array('action' => 'delete', $resource['Resource']['id']), array(), __('Are you sure you want to delete # %s?', $resource['Resource']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('controller' => 'activities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Products'), array('controller' => 'order_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Product'), array('controller' => 'order_products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Activities'); ?></h3>
	<?php if (!empty($resource['Activity'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Recurring'); ?></th>
		<th><?php echo __('Recurring Freq'); ?></th>
		<th><?php echo __('Planned Startdate'); ?></th>
		<th><?php echo __('Planned Enddate'); ?></th>
		<th><?php echo __('Actual Startdate'); ?></th>
		<th><?php echo __('Actual Enddate'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Owner'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('ObjectType'); ?></th>
		<th><?php echo __('ObjectId'); ?></th>
		<th><?php echo __('All Day'); ?></th>
		<th><?php echo __('Auto Flg'); ?></th>
		<th><?php echo __('Act Plan Detail Id'); ?></th>
		<th><?php echo __('Duration'); ?></th>
		<th><?php echo __('Assigned User'); ?></th>
		<th><?php echo __('Account Id'); ?></th>
		<th><?php echo __('Resource Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($resource['Activity'] as $activity): ?>
		<tr>
			<td><?php echo $activity['id']; ?></td>
			<td><?php echo $activity['type']; ?></td>
			<td><?php echo $activity['name']; ?></td>
			<td><?php echo $activity['status']; ?></td>
			<td><?php echo $activity['recurring']; ?></td>
			<td><?php echo $activity['recurring_freq']; ?></td>
			<td><?php echo $activity['planned_startdate']; ?></td>
			<td><?php echo $activity['planned_enddate']; ?></td>
			<td><?php echo $activity['actual_startdate']; ?></td>
			<td><?php echo $activity['actual_enddate']; ?></td>
			<td><?php echo $activity['created']; ?></td>
			<td><?php echo $activity['updated']; ?></td>
			<td><?php echo $activity['created_by']; ?></td>
			<td><?php echo $activity['updated_by']; ?></td>
			<td><?php echo $activity['owner']; ?></td>
			<td><?php echo $activity['description']; ?></td>
			<td><?php echo $activity['objectType']; ?></td>
			<td><?php echo $activity['objectId']; ?></td>
			<td><?php echo $activity['all_day']; ?></td>
			<td><?php echo $activity['auto_flg']; ?></td>
			<td><?php echo $activity['act_plan_detail_id']; ?></td>
			<td><?php echo $activity['duration']; ?></td>
			<td><?php echo $activity['assigned_user']; ?></td>
			<td><?php echo $activity['account_id']; ?></td>
			<td><?php echo $activity['resource_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'activities', 'action' => 'view', $activity['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'activities', 'action' => 'edit', $activity['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'activities', 'action' => 'delete', $activity['id']), array(), __('Are you sure you want to delete # %s?', $activity['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Order Products'); ?></h3>
	<?php if (!empty($resource['OrderProduct'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Product Qty'); ?></th>
		<th><?php echo __('Product Disc'); ?></th>
		<th><?php echo __('Product Price'); ?></th>
		<th><?php echo __('Stock Chk'); ?></th>
		<th><?php echo __('Resourcename'); ?></th>
		<th><?php echo __('Resource Id'); ?></th>
		<th><?php echo __('Datescheduling'); ?></th>
		<th><?php echo __('Datescheduling Enddate'); ?></th>
		<th><?php echo __('Duration'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($resource['OrderProduct'] as $orderProduct): ?>
		<tr>
			<td><?php echo $orderProduct['id']; ?></td>
			<td><?php echo $orderProduct['created']; ?></td>
			<td><?php echo $orderProduct['updated']; ?></td>
			<td><?php echo $orderProduct['created_by']; ?></td>
			<td><?php echo $orderProduct['updated_by']; ?></td>
			<td><?php echo $orderProduct['status']; ?></td>
			<td><?php echo $orderProduct['order_id']; ?></td>
			<td><?php echo $orderProduct['product_id']; ?></td>
			<td><?php echo $orderProduct['product_qty']; ?></td>
			<td><?php echo $orderProduct['product_disc']; ?></td>
			<td><?php echo $orderProduct['product_price']; ?></td>
			<td><?php echo $orderProduct['stock_chk']; ?></td>
			<td><?php echo $orderProduct['resourcename']; ?></td>
			<td><?php echo $orderProduct['resource_id']; ?></td>
			<td><?php echo $orderProduct['datescheduling']; ?></td>
			<td><?php echo $orderProduct['datescheduling_enddate']; ?></td>
			<td><?php echo $orderProduct['duration']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'order_products', 'action' => 'view', $orderProduct['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'order_products', 'action' => 'edit', $orderProduct['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'order_products', 'action' => 'delete', $orderProduct['id']), array(), __('Are you sure you want to delete # %s?', $orderProduct['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order Product'), array('controller' => 'order_products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Teams'); ?></h3>
	<?php if (!empty($resource['Team'])): ?>
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
	<?php foreach ($resource['Team'] as $team): ?>
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
