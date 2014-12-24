<div class="appmenus index">
	<h2><?php echo __('Appmenus'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th><?php echo $this->Paginator->sort('ordershow'); ?></th>
			<th><?php echo $this->Paginator->sort('mkey'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('mname'); ?></th>
			<th><?php echo $this->Paginator->sort('escapeTitle'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('admin'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('controller'); ?></th>
			<th><?php echo $this->Paginator->sort('action'); ?></th>
			<th><?php echo $this->Paginator->sort('linkClass'); ?></th>
			<th><?php echo $this->Paginator->sort('linkID'); ?></th>
			<th><?php echo $this->Paginator->sort('linkDataToggle'); ?></th>
			<th><?php echo $this->Paginator->sort('liClass'); ?></th>
			<th><?php echo $this->Paginator->sort('parentUlClass'); ?></th>
			<th><?php echo $this->Paginator->sort('menuSeparator'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($appmenus as $appmenu): ?>
	<tr>
		<td><?php echo h($appmenu['Appmenu']['id']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['created']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['updated']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['updated_by']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($appmenu['ParentAppmenu']['mname'], array('controller' => 'appmenus', 'action' => 'view', $appmenu['ParentAppmenu']['id'])); ?>
		</td>
		<td><?php echo h($appmenu['Appmenu']['lft']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['rght']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['ordershow']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['mkey']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['type']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['mname']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['escapeTitle']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['title']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['admin']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['url']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['controller']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['action']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['linkClass']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['linkID']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['linkDataToggle']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['liClass']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['parentUlClass']); ?>&nbsp;</td>
		<td><?php echo h($appmenu['Appmenu']['menuSeparator']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $appmenu['Appmenu']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $appmenu['Appmenu']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $appmenu['Appmenu']['id']), array(), __('Are you sure you want to delete # %s?', $appmenu['Appmenu']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Appmenu'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Appmenus'), array('controller' => 'appmenus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Appmenu'), array('controller' => 'appmenus', 'action' => 'add')); ?> </li>
	</ul>
</div>
