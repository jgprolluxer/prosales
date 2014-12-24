<div class="teamWorkstations view">
<h2><?php echo __('Team Workstation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($teamWorkstation['TeamWorkstation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($teamWorkstation['TeamWorkstation']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($teamWorkstation['TeamWorkstation']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo $this->Html->link($teamWorkstation['CreatedBy']['id'], array('controller' => 'users', 'action' => 'view', $teamWorkstation['CreatedBy']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo $this->Html->link($teamWorkstation['UpdatedBy']['id'], array('controller' => 'users', 'action' => 'view', $teamWorkstation['UpdatedBy']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($teamWorkstation['Team']['name'], array('controller' => 'teams', 'action' => 'view', $teamWorkstation['Team']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Workstation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($teamWorkstation['Workstation']['title'], array('controller' => 'workstations', 'action' => 'view', $teamWorkstation['Workstation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($teamWorkstation['TeamWorkstation']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Team Workstation'), array('action' => 'edit', $teamWorkstation['TeamWorkstation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Team Workstation'), array('action' => 'delete', $teamWorkstation['TeamWorkstation']['id']), array(), __('Are you sure you want to delete # %s?', $teamWorkstation['TeamWorkstation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Team Workstations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team Workstation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workstations'), array('controller' => 'workstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workstation'), array('controller' => 'workstations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created By'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
