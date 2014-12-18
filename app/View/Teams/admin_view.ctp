<div class="teams view">
<h2><?php echo __('Team'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($team['Team']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($team['Team']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($team['Team']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($team['Team']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($team['Team']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($team['Team']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Owner'); ?></dt>
		<dd>
			<?php echo $this->Html->link($team['Owner']['title'], array('controller' => 'workstations', 'action' => 'view', $team['Owner']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($team['Team']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($team['Team']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Team'), array('action' => 'edit', $team['Team']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Team'), array('action' => 'delete', $team['Team']['id']), array(), __('Are you sure you want to delete # %s?', $team['Team']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workstations'), array('controller' => 'workstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Owner'), array('controller' => 'workstations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Team Workstations'), array('controller' => 'team_workstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team Workstation'), array('controller' => 'team_workstations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Accounts'); ?></h3>
	<?php if (!empty($team['Account'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Alias'); ?></th>
		<th><?php echo __('Sex'); ?></th>
		<th><?php echo __('Birthdate'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Mode'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Integration Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($team['Account'] as $account): ?>
		<tr>
			<td><?php echo $account['id']; ?></td>
			<td><?php echo $account['created']; ?></td>
			<td><?php echo $account['updated']; ?></td>
			<td><?php echo $account['created_by']; ?></td>
			<td><?php echo $account['updated_by']; ?></td>
			<td><?php echo $account['firstname']; ?></td>
			<td><?php echo $account['lastname']; ?></td>
			<td><?php echo $account['alias']; ?></td>
			<td><?php echo $account['sex']; ?></td>
			<td><?php echo $account['birthdate']; ?></td>
			<td><?php echo $account['team_id']; ?></td>
			<td><?php echo $account['mode']; ?></td>
			<td><?php echo $account['type']; ?></td>
			<td><?php echo $account['integration_id']; ?></td>
			<td><?php echo $account['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'accounts', 'action' => 'view', $account['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'accounts', 'action' => 'edit', $account['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'accounts', 'action' => 'delete', $account['id']), array(), __('Are you sure you want to delete # %s?', $account['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Team Workstations'); ?></h3>
	<?php if (!empty($team['TeamWorkstation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Workstation Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($team['TeamWorkstation'] as $teamWorkstation): ?>
		<tr>
			<td><?php echo $teamWorkstation['id']; ?></td>
			<td><?php echo $teamWorkstation['created']; ?></td>
			<td><?php echo $teamWorkstation['updated']; ?></td>
			<td><?php echo $teamWorkstation['created_by']; ?></td>
			<td><?php echo $teamWorkstation['updated_by']; ?></td>
			<td><?php echo $teamWorkstation['team_id']; ?></td>
			<td><?php echo $teamWorkstation['workstation_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'team_workstations', 'action' => 'view', $teamWorkstation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'team_workstations', 'action' => 'edit', $teamWorkstation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'team_workstations', 'action' => 'delete', $teamWorkstation['id']), array(), __('Are you sure you want to delete # %s?', $teamWorkstation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Team Workstation'), array('controller' => 'team_workstations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
