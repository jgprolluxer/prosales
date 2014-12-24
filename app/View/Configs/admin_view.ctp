<div class="configs view">
<h2><?php echo __('Config'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($config['Config']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($config['Config']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Productname'); ?></dt>
		<dd>
			<?php echo h($config['Config']['productname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($config['Config']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($config['Config']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($config['Config']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($config['Config']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active Flg'); ?></dt>
		<dd>
			<?php echo h($config['Config']['active_flg']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timezone'); ?></dt>
		<dd>
			<?php echo h($config['Config']['timezone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo h($config['Config']['logo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($config['Config']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($config['Config']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($config['Config']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Copyright'); ?></dt>
		<dd>
			<?php echo h($config['Config']['copyright']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Config'), array('action' => 'edit', $config['Config']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Config'), array('action' => 'delete', $config['Config']['id']), array(), __('Are you sure you want to delete # %s?', $config['Config']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Configs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Config'), array('action' => 'add')); ?> </li>
	</ul>
</div>
