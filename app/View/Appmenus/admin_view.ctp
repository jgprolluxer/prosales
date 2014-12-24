<div class="appmenus view">
<h2><?php echo __('Appmenu'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Appmenu'); ?></dt>
		<dd>
			<?php echo $this->Html->link($appmenu['ParentAppmenu']['mname'], array('controller' => 'appmenus', 'action' => 'view', $appmenu['ParentAppmenu']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordershow'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['ordershow']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mkey'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['mkey']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mname'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['mname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('EscapeTitle'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['escapeTitle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admin'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['admin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controller'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['controller']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LinkClass'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['linkClass']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LinkID'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['linkID']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LinkDataToggle'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['linkDataToggle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LiClass'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['liClass']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ParentUlClass'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['parentUlClass']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('MenuSeparator'); ?></dt>
		<dd>
			<?php echo h($appmenu['Appmenu']['menuSeparator']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Appmenu'), array('action' => 'edit', $appmenu['Appmenu']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Appmenu'), array('action' => 'delete', $appmenu['Appmenu']['id']), array(), __('Are you sure you want to delete # %s?', $appmenu['Appmenu']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Appmenus'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Appmenu'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Appmenus'), array('controller' => 'appmenus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Appmenu'), array('controller' => 'appmenus', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Appmenus'); ?></h3>
	<?php if (!empty($appmenu['ChildAppmenu'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Ordershow'); ?></th>
		<th><?php echo __('Mkey'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Mname'); ?></th>
		<th><?php echo __('EscapeTitle'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Admin'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Controller'); ?></th>
		<th><?php echo __('Action'); ?></th>
		<th><?php echo __('LinkClass'); ?></th>
		<th><?php echo __('LinkID'); ?></th>
		<th><?php echo __('LinkDataToggle'); ?></th>
		<th><?php echo __('LiClass'); ?></th>
		<th><?php echo __('ParentUlClass'); ?></th>
		<th><?php echo __('MenuSeparator'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($appmenu['ChildAppmenu'] as $childAppmenu): ?>
		<tr>
			<td><?php echo $childAppmenu['id']; ?></td>
			<td><?php echo $childAppmenu['created']; ?></td>
			<td><?php echo $childAppmenu['updated']; ?></td>
			<td><?php echo $childAppmenu['created_by']; ?></td>
			<td><?php echo $childAppmenu['updated_by']; ?></td>
			<td><?php echo $childAppmenu['parent_id']; ?></td>
			<td><?php echo $childAppmenu['lft']; ?></td>
			<td><?php echo $childAppmenu['rght']; ?></td>
			<td><?php echo $childAppmenu['ordershow']; ?></td>
			<td><?php echo $childAppmenu['mkey']; ?></td>
			<td><?php echo $childAppmenu['type']; ?></td>
			<td><?php echo $childAppmenu['mname']; ?></td>
			<td><?php echo $childAppmenu['escapeTitle']; ?></td>
			<td><?php echo $childAppmenu['title']; ?></td>
			<td><?php echo $childAppmenu['admin']; ?></td>
			<td><?php echo $childAppmenu['url']; ?></td>
			<td><?php echo $childAppmenu['controller']; ?></td>
			<td><?php echo $childAppmenu['action']; ?></td>
			<td><?php echo $childAppmenu['linkClass']; ?></td>
			<td><?php echo $childAppmenu['linkID']; ?></td>
			<td><?php echo $childAppmenu['linkDataToggle']; ?></td>
			<td><?php echo $childAppmenu['liClass']; ?></td>
			<td><?php echo $childAppmenu['parentUlClass']; ?></td>
			<td><?php echo $childAppmenu['menuSeparator']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'appmenus', 'action' => 'view', $childAppmenu['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'appmenus', 'action' => 'edit', $childAppmenu['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'appmenus', 'action' => 'delete', $childAppmenu['id']), array(), __('Are you sure you want to delete # %s?', $childAppmenu['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Appmenu'), array('controller' => 'appmenus', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
