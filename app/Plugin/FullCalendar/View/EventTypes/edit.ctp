<?php
/*
 * Views/EventTypes/edit.ctp
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
		    <a id="lastCrumb" href="#"><span>Editando Tipo de Evento <?php echo $this->data['EventType']['id'] ?></span></a>
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
							<li class="Welcome"><a href="/full_calendar" class=""><span><?php echo __('Calendario') ?></span></a></li>
							<li class="Getting-Started"><a href="/full_calendar/events/add"><span><?php echo __('Nuevo Evento') ?></span></a></li>
							<li class="Getting-Started"><a href="/full_calendar/events"><span><?php echo __('Editar Eventos') ?></span></a></li>
							<li class="Getting-Started" id="current"><a href="/full_calendar/eventTypes"><span><?php echo __('Editar Tipos de Eventos') ?></span></a></li>
						</ul>
					</td>
				</tr>
			</tbody></table>
		</div>
</div>		
<div class="clear"></div>
<div id="content" style="border-top-style: none;">
<div class="container-box">
<div class="eventTypes form">
<?php echo $this->Form->create('EventType');?>
	<fieldset>
 		<legend><?php __('Edit Event Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('color', 
					array('options' => array(
						'Blue' => 'Blue',
						'Red' => 'Red',
						'Pink' => 'Pink',
						'Purple' => 'Purple',
						'Orange' => 'Orange',
						'Green' => 'Green',
						'Gray' => 'Gray',
						'Black' => 'Black',
						'Brown' => 'Brown'
					)));

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
</div>
</div>
