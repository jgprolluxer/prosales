<?php
/*
 * View/Events/view.ctp
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
	       	<a id="firstCrumb" href="<?php echo Router::url("/full_calendar/events"); ?>"><span>Eventos</span></a>
		    <a id="lastCrumb" href="#"><span>Viendo Evento <?php echo $event['Event']['id'] ?></span></a>
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
<div class="events view">
<h2><?php echo __('Event'); ?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Event Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($event['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $event['EventType']['id'])); ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['title']; ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Details'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['details']; ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['status']; ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Start'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo CakeTime::format($event['Event']['start'],'%c', 'N/A', $this->Session->read('Auth.User.time_zone')); ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('End'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php if($event['Event']['all_day'] != 1) { echo CakeTime::format($event['Event']['end'],'%c', 'N/A', $this->Session->read('Auth.User.time_zone')); } else { echo "N/A"; } ?></dd>
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('All Day'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php if($event['Event']['all_day'] == 1) { echo "Yes"; } else { echo "No"; } ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['created']; ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['modified']; ?></dd>
	</dl>
</div>
</div>
</div>
