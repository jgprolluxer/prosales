<table id="login-wrapper">
<tbody>
<tr>
<td id="login-wrapper-cell">
<div id="dialogContent">
<div class="auth-form">
<?php
	echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));
?>
	<div class="auth-form-header">
		<h1>Login</h1>
	</div>
	<div class="auth-form-body">
<?php
	echo $this->Form->input('User.username', array('label'=> 'Usuario (correo electronico)','class' => 'input-block'));
	echo $this->Form->input('User.password', array('class' => 'input-block'));	
	echo $this->Form->end('Login');
?>
	</div>
<?php
	//echo $this->Form->end('Login');
?>	
</div>

</div>
</td>
</tr>
</tbody>
</table>