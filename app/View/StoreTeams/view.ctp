<div class="storeTeams view">
<h2><?php echo __('Store Team'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($storeTeam['StoreTeam']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($storeTeam['StoreTeam']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($storeTeam['StoreTeam']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($storeTeam['StoreTeam']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($storeTeam['StoreTeam']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store'); ?></dt>
		<dd>
			<?php echo $this->Html->link($storeTeam['Store']['name'], array('controller' => 'stores', 'action' => 'view', $storeTeam['Store']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($storeTeam['Team']['name'], array('controller' => 'teams', 'action' => 'view', $storeTeam['Team']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Store Team'), array('action' => 'edit', $storeTeam['StoreTeam']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Store Team'), array('action' => 'delete', $storeTeam['StoreTeam']['id']), array(), __('Are you sure you want to delete # %s?', $storeTeam['StoreTeam']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Store Teams'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store Team'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
