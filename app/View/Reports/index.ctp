<div class="reports index">
	<h2><?php echo __('Reports'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('rkey'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('modelName'); ?></th>
			<th><?php echo $this->Paginator->sort('findType'); ?></th>
			<th><?php echo $this->Paginator->sort('recursive'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($reports as $report): ?>
	<tr>
		<td><?php echo h($report['Report']['id']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['created']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['updated']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['title']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['rkey']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['type']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['status']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['modelName']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['findType']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['recursive']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $report['Report']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $report['Report']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $report['Report']['id']), array(), __('Are you sure you want to delete # %s?', $report['Report']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Report'), array('action' => 'add')); ?></li>
	</ul>
</div>
