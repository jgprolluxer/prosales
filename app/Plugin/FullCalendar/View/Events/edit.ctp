<?php
/*
 * View/Events/edit.ctp
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
		    <a id="lastCrumb" href="#"><span>Editando Evento <?php echo $this->data['Event']['id'] ?></span></a>
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
<div class="events form">
<?php echo $this->Form->create('Event');?>
	<fieldset>
 		<legend><?php __('Edit Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('event_type_id');
		echo $this->Form->input('title');
		echo $this->Form->input('details');
		echo $this->Form->input('start');
		echo $this->Form->input('end');
		echo $this->Form->input('all_day');
		echo $this->Form->input('status', array('options' => array(
					'Scheduled' => 'Scheduled','Confirmed' => 'Confirmed','In Progress' => 'In Progress',
					'Rescheduled' => 'Rescheduled','Completed' => 'Completed'
					)
				)
			);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
</div>
</div>