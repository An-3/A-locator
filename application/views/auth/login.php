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
	
	<h2>Пожалуйста, введите адрес своей электропочты и пароль</h2>		
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
	      <label for="remember">Помнить меня:</label>
	      <?php echo form_checkbox('remember', '1', FALSE);?>
	  </p>
      <p><?php echo form_submit('submit', 'Войти');?></p>
    <?php echo form_close();?>
	</div> 
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/jquery-latest.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>