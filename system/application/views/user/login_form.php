<style type="text/css">
		.toggler { width: 500px; height: 200px; position: relative;}
		#button { padding: .5em 1em; text-decoration: none; }
		#effect { text-align: center; width: 280px; margin:20px auto; padding: 0.4em; position: relative; }
		#effect h4 { margin: 0; padding: 0.4em; text-align: center; }
		.ui-effects-transfer { border: 2px dotted gray; } 
	</style>
<div id="effect" class="ui-widget-content ui-corner-all">
<h4 class="ui-widget-header ui-corner-all">Login Form</h4>
<?php 
			echo form_open('user/login/validate_credentials');
			echo "Username<br/>";
			echo form_input('username', '');?>
			<br/>
			<?php 
			echo "Password<br/>";
			echo form_password('password', '');?>
			<br/>
			<?php
			echo form_submit('submit', 'Login');
			echo form_close();
			?>
			
</div>