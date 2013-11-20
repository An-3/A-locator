<!DOCTYPE html>
<html>
  <head>
    <title>А-локатор</title>
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/bootstrap-switch.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/jAutochecklist.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/general.css" rel="stylesheet">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<script src="<?php echo $this->config->item('base_url'); ?>assets/js/jquery-latest.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/jAutochecklist.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/markerwithlabel.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/google_maps.js"></script>
  </head>
  <body>
  	<div>
		<div class="navbar">
			<nav class="navbar-inner">
				<a class="brand">А-локатор</a>
				<ul class="nav">
					<li class="divider-vertical"></li>
					<li><a href="#">Все друзья</a></li>
					<li><a href="#">История</a></li>
				</ul>
				<ul class="nav pull-right">
					<li><a>Бобошко Андрей</a></li>
					<li class="divider-vertical"></li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a>Пригласить друга</a></li>
						<li><a href=#modal role="button" data-toggle="modal">Настройки</a></li>
						<li><a href="<?php echo $this->config->item('base_url');?>index.php/auth/logout">Выход</a></li>
					</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
    <div id="map-canvas"></div>
	<div id="modal" class="modal hide fade">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h2>Настройки</h2>
		</div>
		<div class="modal-body">
			<ul class="nav nav-tabs" id="SettingsTab">
				<li class="active"><a href="#position" data-toggle="tab">Местоположения</a></li>
				<li class><a href="#private" data-toggle="tab">Приватности</a></li>
				<li class><a href="#history" data-toggle="tab">Истории</a></li>
				<li class><a href="#account" data-toggle="tab">Аккаунта</a></li>
			</ul>
			<div class="tab-content" id="SettingsTabContent">
				<div class="tab-pane fade active in" id="position">
					<p>Определять положение</p>
					<div id="position-mode-switch" class="make-switch" data-on-label="Авто" data-off-label="Руч">
					    <input type="radio">
					</div>
				</div>
				<div class="tab-pane fade" id="private">
					<p>Скрыть меня от </p>
					<select class="jAutochecklist" id="UserList" multiple>
					    <option>Вася Пупкин</option>
					    <option>Алексей Гагарин</option>
					    <option>Иво Бобул</option>
					</select>
				</div>
				<div class="tab-pane fade" id="history">
					Ведение истории местоположений
				</div>
				<div class="tab-pane fade" id="account">
					Пароли
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo $this->config->item('base_url'); ?>assets/js/home_view.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/bootstrap-switch.js"></script>
  </body>
</html>