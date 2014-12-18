<?php
/*
 * View/EventTypes/view.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<div id="content-header">
        <div id="breadCrumb">
	        <a id="firstCrumb" href="<?php echo Router::url("/full_calendar"); ?>"><span>Calendario</span></a>
	       	<a id="firstCrumb" href="<?php echo Router::url("/full_calendar/eventTypes"); ?>"><span>Tipos de Eventos</span></a>
		    <a id="lastCrumb" href="#"><span>Viendo Tipo de Evento <?php echo $eventType['EventType']['id'] ?></span></a>
	    </div>
        <div id="pageName">
            <h2>
                <?php echo __('Calendario'); ?>
            </h2>
        </div>
        <div class="msgArea">
			<?php echo $this->Session->flash(); ?>
        </div>
        <div class="tabs" align="center">
			<table border="0" cellpadding="0" cellspacing="0">
				<tbody><tr>
					<td id="tabRow">
						<ul>
							<li class="Welcome"><a href="<?php echo Router::url("/full_calendar"); ?>" class=""><span><?php echo __('Calendario') ?></span></a></li>
							<li class="Getting-Started"><a href="<?php echo Router::url("/full_calendar/events/add"); ?>"><span><?php echo __('Nuevo Evento') ?></span></a></li>
							<li class="Getting-Started"><a href="<?php echo Router::url("/full_calendar/events"); ?>"><span><?php echo __('Editar Eventos') ?></span></a></li>
							<li class="Getting-Started" id="current"><a href="<?php echo Router::url("/full_calendar/eventTypes"); ?>"><span><?php echo __('Editar Tipos de Eventos') ?></span></a></li>
						</ul>
					</td>
				</tr>
			</tbody></table>
		</div>
</div>		
<div class="clear"></div>
<div id="content" style="border-top-style: none;">
<div class="container-box">
<div class="eventTypes view">
<h2><?php echo __('Event Type');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eventType['EventType']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Color'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eventType['EventType']['color']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Events');?></h3>
	<?php if (!empty($eventType['Event'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Start'); ?></th>
        <th><?php echo __('End'); ?></th>
        <th><?php echo __('All Day'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"></th>
	</tr>
	<?php
		$i = 0;
		foreach ($eventType['Event'] as $event):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $event['title'];?></td>
			<td><?php echo $event['status'];?></td>
			<td><?php echo $event['start'];?></td>
            <td><?php if($event['all_day'] != 1) { echo $event['end']; } else { echo "N/A"; } ?></td>
            <td><?php if($event['all_day'] == 1) { echo "Yes"; } else { echo "No"; }?></td>
			<td><?php echo $event['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'view', $event['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'edit', $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
</div>
</div>

