<?php
	$adjustment = $dataForView["adjustment"][0];
?>

<div class="adjustments view">
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($adjustment['Adjustment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($adjustment['Adjustment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($adjustment['Adjustment']['modified']); ?>
			&nbsp;
		</dd>
		<?php if ($this->Session->read('Auth.User.group_id') == '1'): ?>	
			<dt><?php echo __('Adjcompanies'); ?></dt>
			<dd>
				<?php echo $this->Html->link($adjustment['Adjcompanies']['name'], array('controller' => 'adj_companies', 'action' => 'view', $adjustment['Adjcompanies']['id'])); ?>
				&nbsp;
			</dd>
		<?php endif; ?>
		<dt><?php echo __('Inscompanies'); ?></dt>
		<dd>
			<?php echo $this->Html->link($adjustment['Inscompanies']['name'], array('controller' => 'ins_companies', 'action' => 'view', $adjustment['Inscompanies']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instypes'); ?></dt>
		<dd>
			<?php echo $this->Html->link($adjustment['Instypes']['name'], array('controller' => 'instypes', 'action' => 'view', $adjustment['Instypes']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($adjustment['User']['id'], array('controller' => 'users', 'action' => 'view', $adjustment['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Policy Owner'); ?></dt>
		<dd>
			<?php echo h($adjustment['Adjustment']['policy_owner']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Policy Duedate'); ?></dt>
		<dd>
			<?php echo h($adjustment['Adjustment']['policy_duedate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo nl2br($adjustment['Adjustment']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Poliza'); ?></dt>
		<dd>
			<?php
				if($adjustment['Adjustment']['policy'])
				{
					echo $this->Html->link($this->Html->image("/img/attach.gif", array(
				   	'height'=> '28px', 'width'=> '28px')),
				    $adjustment['Adjustment']['policy'],
				    array('escape' => false, "target" => "_blank",  "alt" => "Poliza"));
				 }
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assigned User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($adjustment['AssignedUser']['id'], array('controller' => 'users', 'action' => 'view', $adjustment['AssignedUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adjstatuses'); ?></dt>
		<dd>
			<?php echo $this->Html->link($adjustment['Adjstatuses']['name'], array('controller' => 'adj_statuses', 'action' => 'view', $adjustment['Adjstatuses']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>

