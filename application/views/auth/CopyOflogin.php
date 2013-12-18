<!DOCTYPE html>
<html>
  <head>
    <title>А-локатор</title>
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body{
        height: 100%;
        margin: 0px;
        padding: 0px;
      }
    </style>
  </head>
  <body>

  	
	<div class="container">
    	<div class="span12 pagination-centered">
    		<p> <h2><img src="<?php echo $this->config->item('base_url'); ?>assets/img/a-locator_logo.png" width="64"> Электропочта и пароль!</h2></p>
   		</div>
   		<p>
   		<div class="btn-group">
   			<button class="btn">Вход</button>
   			<button class="btn">Регистрация</button>
   		</div>
   		</p>
	  	<div class="span4">
   			<?php echo form_open("auth/login");?>
		      <p>
		      	<label for="email">Электропочта:</label>
		      	<?php echo form_input($email);?>
		      </p>      
		      <p>
		      	<label for="password">Пароль:</label>
		      	<?php echo form_input($password);?>
		      </p>
		      <p>
			      <label for="remember">Помнить меня: <?php echo form_checkbox('remember', '1', FALSE);?></label>
			  </p>
		      <p><?php echo form_submit('submit', 'Войти');?></p>
		    <?php echo form_close();?>
   		</div>
	</div>
	 
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/jquery-latest.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>