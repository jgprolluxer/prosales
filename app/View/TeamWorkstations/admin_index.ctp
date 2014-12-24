<div class="teamWorkstations index">
	<h2><?php echo __('Team Workstations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('team_id'); ?></th>
			<th><?php echo $this->Paginator->sort('workstation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($teamWorkstations as $teamWorkstation): ?>
	<tr>
		<td><?php echo h($teamWorkstation['TeamWorkstation']['id']); ?>&nbsp;</td>
		<td><?php echo h($teamWorkstation['TeamWorkstation']['created']); ?>&nbsp;</td>
		<td><?php echo h($teamWorkstation['TeamWorkstation']['updated']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($teamWorkstation['CreatedBy']['id'], array('controller' => 'users', 'action' => 'view', $teamWorkstation['CreatedBy']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($teamWorkstation['UpdatedBy']['id'], array('controller' => 'users', 'action' => 'view', $teamWorkstation['UpdatedBy']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($teamWorkstation['Team']['name'], array('controller' => 'teams', 'action' => 'view', $teamWorkstation['Team']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($teamWorkstation['Workstation']['title'], array('controller' => 'workstations', 'action' => 'view', $teamWorkstation['Workstation']['id'])); ?>
		</td>
		<td><?php echo h($teamWorkstation['TeamWorkstation']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $teamWorkstation['TeamWorkstation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $teamWorkstation['TeamWorkstation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $teamWorkstation['TeamWorkstation']['id']), array(), __('Are you sure you want to delete # %s?', $teamWorkstation['TeamWorkstation']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Team Workstation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workstations'), array('controller' => 'workstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workstation'), array('controller' => 'workstations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created By'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
