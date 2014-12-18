<?php
App::uses('CakeTime', 'Utility');

/*
 * View/Events/index.ctp
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
	       	<a id="lastCrumb" href="#"><span>Eventos</span></a>
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
							<li class="Getting-Started" id="current"><a href="<?php echo Router::url("/full_calendar/events"); ?>"><span><?php echo __('Editar Eventos') ?></span></a></li>
							<li class="Getting-Started"><a href="<?php echo Router::url("/full_calendar/eventTypes"); ?>"><span><?php echo __('Editar Tipos de Eventos') ?></span></a></li>
						</ul>
					</td>
				</tr>
			</tbody></table>
		</div>
</div>		
<div class="clear"></div>
<div id="content" style="border-top-style: none;">
<div class="container-box">
<div class="events index">
	<h2><?php __('Events');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('event_type_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('start');?></th>
            <th><?php echo $this->Paginator->sort('end');?></th>
            <th><?php echo $this->Paginator->sort('all_day');?></th>
			<th class="actions"></th>
	</tr>
	<?php
	$i = 0;
	foreach ($events as $event):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($event['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $event['EventType']['id'])); ?>
		</td>
		<td><?php echo $event['Event']['title']; ?></td>
		<td><?php echo $event['Event']['status']; ?></td>
		<td><?php echo CakeTime::format($event['Event']['start'],'%c', 'N/A', $this->Session->read('Auth.User.time_zone')); ?></td>
        <?php if($event['Event']['all_day'] == 0) { ?>
   		<td><?php echo CakeTime::format($event['Event']['end'],'%c', 'N/A', $this->Session->read('Auth.User.time_zone')); ?></td>
        <?php } else { ?>
		<td>N/A</td>
        <?php } ?>
        <td><?php if($event['Event']['all_day'] == 1) { echo "Yes"; } else { echo "No"; } ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $event['Event']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $event['Event']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
</div>
</div>