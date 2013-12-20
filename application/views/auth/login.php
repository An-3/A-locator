<!DOCTYPE html>
<html>
  <head>
    <title>А-локатор</title>
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/general.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/entry.css" rel="stylesheet">
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
	<div class="row">
		<br>
	</div>
		<div class="container pagination-centered">
			<div class="alert alert-block <?php echo $message ? '': 'invisible';?>">
				<div id="infoMessage"><?php echo $message;?></div>
			</div>
			<div class=" pagination-centered">
	    		<p><h2><img src="<?php echo $this->config->item('base_url'); ?>assets/img/a-locator_logo.png" width="32"> А-локатор</h2></p>
	   		</div>
			<?php $attributes = array('class' => 'form-signin pagination-centered'); echo form_open("auth/login", $attributes);?>
			<div class="row">
			  <div class="centered-pills">
				<ul class="nav nav-pills">
					<li class="active">
				    	<a href="#">Вход</a>
					</li>
					<li>
				  		<a href="registration">Регистрация</a>
			  		</li>
				</ul>
			  </div>
			</div>
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
			<p><?php $attributes = array('class' => 'btn btn-large btn-primary'); echo form_submit($attributes, 'Войти', 'submit');?></p>
    		<?php echo form_close();?>
    </div>
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/jquery-latest.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>