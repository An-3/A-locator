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
    <div class="container">
		<div class="span12 pagination-centered">
    		<p><h2><img src="<?php echo $this->config->item('base_url'); ?>assets/img/a-locator_logo.png" width="32"> А-локатор</h2></p>
   		</div>
		<form class="form-signin">
        	<p>
				<ul class="nav nav-pills">
					<li class="active">
				    	<a href="#">Вход</a>
					</li>
					<li>
				  		<a href="registration">Регистрация</a>
			  		</li>
				</ul>
			</p>
	        <input type="text" class="input-block-level" placeholder="Электропочта">
	        <input type="password" class="input-block-level" placeholder="Пароль">
	        <label class="checkbox">
				<input type="checkbox" value="remember-me"> Помнить меня
        	</label>
        	<button class="btn btn-large btn-primary" type="submit">Войти</button>
		</form>
    </div>


	 
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/jquery-latest.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>