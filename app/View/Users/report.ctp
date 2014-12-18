<?php
		echo $this->Html->script('jquery/jquery', array ('inline' => false ) );		
		echo $this->Html->script ( 'jquery/ui/jquery.ui.core', array ('inline' => false ) );
?>
<div class="users view">
	<?php echo $this->App->drawReportMenu(); ?>
	There's no user reports yet....
</div>

<?php echo $this->App->drawMainMenu(); ?>
