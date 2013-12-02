<!DOCTYPE html>
<html>
  <head>
    <title>А-локатор</title>
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/bootstrap-switch.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/bootstrap-multiselect.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/slider.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/daterangepicker-bs2.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/general.css" rel="stylesheet">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<script src="<?php echo $this->config->item('base_url'); ?>assets/js/jquery-latest.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/markerwithlabel.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/google_maps.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/bootstrap-multiselect.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/bootstrap-slider.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/jquery.bootstrap-growl.js"></script>
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
						<li><a href=#friends-modal role="button" data-toggle="modal">Пригласить друга</a></li>
						<li><a href=#settings-modal role="button" data-toggle="modal">Настройки</a></li>
						<li><a href="<?php echo $this->config->item('base_url');?>index.php/auth/logout">Выход</a></li>
					</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
    <div id="map-canvas"></div>
	<div id="settings-modal" class="modal hide fade">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h2>Настройки</h2>
		</div>
		<div id="modal-body-settings" class="modal-body">
			<ul class="nav nav-tabs" id="SettingsTab">
				<li class="active"><a href="#position" data-toggle="tab">Местоположения</a></li>
				<li class><a href="#private" data-toggle="tab">Приватности</a></li>
				<li class><a href="#history" data-toggle="tab">Истории</a></li>
				<li class><a href="#account" data-toggle="tab">Аккаунта</a></li>
			</ul>
			<div class="tab-content" id="SettingsTabContent">
				<div class="tab-pane fade active in" id="position">
					<p>Определять положение</p>
				    <div id="position_mode" class="label-toggle-switch make-switch" data-on-label="Авто" data-off-label="Руч">
				        <input type="checkbox"
					        <?php
						        if ($position_mode == "1")
						        {
						        	echo "checked";
						        }
					        ?>
				        />
				    </div>
				</div>
				<div class="tab-pane fade" id="private">
					<div class="row">
						<div class="span4">
				        	<p>
				        		Скрыть меня от:
			        		</p>
			        		<p>
					        	<select class="multiselect" multiple="multiple">
								  <option value="cheese">Вася Пупкин</option>
								  <option value="tomatoes">Меня самого</option>
								  <option value="mozarella">Его Величества</option>
								  <option value="mushrooms">Око Саурона</option>
								  <option value="pepperoni">Правосудия</option>
								  <option value="onions">Мертвая рука Атредисов</option>
								</select>
							</p>
				        </div>
						<div class="span4">
							<p>
								Временно на
							</p>
							<input type="text" id="foo" class="span2" value="" data-slider-min="1" data-slider-max="60" data-slider-step="1" data-slider-value="-14" data-slider-orientation="horizontal" data-slider-selection="after"data-slider-tooltip="hide">
							<br>
							<br>
							<input type="text" id="bar"> мин
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="history">
					<div class="row">
						<div class="span4">
							<p>Вести историю</p>
						    <div id="hyst" class="label-toggle-switch make-switch" data-on-label="Да" data-off-label="Нет">
						        <input type="checkbox"
							        <?php
								        if ($hyst == "1")
								        {
								        	echo "checked";
								        }
							        ?>
						        />
						    </div>
						</div>
						<div class="span4">
				        	<p>
				        		Очистить историю за период
			        		</p>
			        		<p>
								<div id="reportrange" class="pull-right">
								    <i class="icon-calendar icon-large"></i>
								    <span><?php echo date("F j, Y", strtotime('-30 day')); ?> - <?php echo date("F j, Y"); ?></span> <b class="caret"></b>
								</div>
							</p>
							<p>
								&nbsp;
							</p>
							<p>
								<div>
									<button class="btn">Очистить</button>
								</div>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="span4">
								
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="account">
					<div class="span2">
						<div class="row">
							<div class="span1">
								<div class="fileinput fileinput-new" data-provides="fileinput">
								  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 128px; height: 128px;"></div>
								  <div>
								    <span class="btn btn-default btn-file"><span class="fileinput-new">Выбрать</span>
								    <span class="fileinput-exists">Изменить</span><input type="file" name="..."></span>
								    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Удалить</a>
								  </div>
								  <img src="<?php echo $this->config->item('base_url'); ?>assets/img/loading.gif" id="loading-indicator" style="display:none" />
								</div>	
							</div>
							<div class="span3">
								
							</div>
						</div>

					</div>
					
					<div class="span4">
						<div class="row">
							<div class="span1">
								<p>Компания:</p>	
							</div>
							<div class="span2">
								<p>
									<input type="text" value="<?php echo $company;?>" class='input_edit' name='company' readonly="readonly">										
								</p>
							</div>
						</div>
						<div class="row">
							<div class="span1">
								<p>Телефон:</p>	
							</div>
							<div class="span2">
								<p><input type="text" value="<?php echo $phone;?>" class='input_edit' name='phone' readonly="readonly"></p>	
							</div>
						</div>
						<div class="row">
							<div class="span1">
								<p>Слоган:</p>	
							</div>
							<div class="span2">
								<p><input type="text" value="<?php echo $slogan;?>" class='input_edit' name='slogan' readonly="readonly"></p>
							</div>
						</div>
					</div>
					
					<div class="span4">
						<div class="row">
							<div class="span1">
								<p>Ник:</p>	
							</div>
							<div class="span2">
								<p><input type="text" value="<?php echo $username;?>" class='input_edit' name='username' readonly="readonly"></p>	
							</div>
						</div>
						<div class="row">
							<div class="span1">
								<p>Имя:</p>	
							</div>
							<div class="span2">
								<p><input type="text" value="<?php echo $first_name;?>" class='input_edit' name='first_name' readonly="readonly"></p>
							</div>
						</div>
						<div class="row">
							<div class="span1">
								<p>Фамилия:</p>	
							</div>
							<div class="span2">
								<p><input type="text" value="<?php echo $last_name;?>" class='input_edit' name='last_name' readonly="readonly"></p>
							</div>
						</div>
						<div class="row">
							<div class="span1">
								<p>Э-почта:</p>	
							</div>
							<div class="span2">
								<p><input type="text" value="<?php echo $email;?>" class='input_edit' name='email' readonly="readonly"></p>	
							</div>
						</div>
						<div class="row" align="right">
							<div class="span2">
								<p><input type="text" class="span2" disabled value="******"></p>	
							</div>
							<div class="span2">
								<p><button class="btn">Изменить пароль</button></p>	
							</div>
						</div>
						<div class="row">
							<div class="span4">
								<p>&nbsp;</p>	
							</div>
						</div>
						<div class="row">
							<div class="span4">
								<p><button class="btn pull-right">Удалить аккаунт</button></p>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="friends-modal" class="modal hide fade">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h2>Привести друга</h2>
		</div>
		<div id="modal-body-settings" class="modal-body">
			<ul class="nav nav-tabs" id="SettingsTab">
				<li class="active"><a href="#invite" data-toggle="tab">По инвайту</a></li>
				<li class><a href="#mail" data-toggle="tab">По электропочте</a></li>
				<li class><a href="#social" data-toggle="tab">Из соцсетей</a></li>
				<li class><a href="#phone" data-toggle="tab">По телефону</a></li>
			</ul>
			<div class="tab-content" id="FriendsTabContent">
				<div class="tab-pane fade active in" id="invite">
					<p>Приглашения</p>
				</div>
				<div class="tab-pane fade" id="mail">
					<p>По электронной почте</p>
				</div>
				<div class="tab-pane fade active in" id="social">
					<p>Из соцсетей</p>
				</div>
				<div class="tab-pane fade active in" id="phone">
					<p>По телефону</p>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo $this->config->item('base_url'); ?>assets/js/jasny-bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/bootstrap-switch.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/home_view.js"></script>
  </body>
</html>