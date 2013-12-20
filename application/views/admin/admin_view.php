<!DOCTYPE html>
<html>
  <head>
    <title>А-локатор</title>
    
    <?php $this->load->helper('form');?>
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/bootstrap-switch.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/bootstrap-multiselect.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/daterangepicker-bs2.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/general.css" rel="stylesheet">	

    <link href="<?php echo $this->config->item('base_url'); ?>assets/css/jslider.plastic.css" rel="stylesheet">
    
    
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	
	<script src="<?php echo $this->config->item('base_url'); ?>assets/js/jquery-latest.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/bootstrap-multiselect.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/jquery.bootstrap-growl.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/jquery.ui.widget.js"></script>	
	
	<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>assets/js/jquery.slider.js"></script>	
	
  </head>
  <body>
  	<div>
		<div class="navbar">
			<nav class="navbar-inner">
				<a class="brand"><img src="<?php echo $this->config->item('base_url'); ?>assets/img/a-locator_logo.png" width="18"> А-локатор</a>
				<ul class="nav">
					<li class="divider-vertical"></li>
					<li><a href="<?php ?>">Пользователи</a></li>
					<li><a href="<?php echo $this->config->item('base_url')."index.php/admin/invites" ?>">Инвайты</a></li>
					<li><a href="#">Лог</a></li>
					
				</ul>
				<ul class="nav pull-right">
					<?php
						if ($group_id == 1)
						{
							$link = $this->config->item('base_url')."index.php/home";
							echo "<li><a href=".$link.">Карта</a></li>";
						}
					?>
					<li><a><?php
								if ($first_name == "" or $last_name == "")
								{
									echo $username;
								} else {
									echo $first_name." ".$last_name;
								}
							?>
					</a></li>
					<li class="divider-vertical"></li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href=#friends-modal role="button" data-toggle="modal">Пригласить друга</a></li>
						<li id="button-settings"><a href=#settings-modal role="button" data-toggle="modal">Настройки</a></li>
						<li><a href="<?php echo $this->config->item('base_url');?>index.php/auth/logout">Выход</a></li>
					</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
    <div id="content"></div>
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
				        <input type="checkbox"/>
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
							<input type="text" id="hide_period_slider" class="span2" value="" data-slider-min="1" data-slider-max="60" data-slider-step="1" data-slider-value="-14" data-slider-orientation="horizontal" data-slider-selection="after"data-slider-tooltip="hide">
							<br>
							<br>
							<input type="text" id="hide_period"> мин
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="history">
					<div class="row">
						<div class="span4">
							<p>Вести историю</p>
						    <div id="hyst" class="label-toggle-switch make-switch" data-on-label="Да" data-off-label="Нет">
						        <input type="checkbox"/>
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
							  <div class="fileinput-preview thumbnail" style="width: 120px; height: 120px; line-height: 120px">
							  	<img alt="" id="userpic" src="" >
								<div id="progress">
								    <div class="bar" style="width: 0%;"></div>
								</div>
							  </div>
							<?php echo form_open_multipart('/uploader', array('id' => 'fileuploader')); ?>
				            <button  type="button" class="btn">
					            <span class="fileinput-button">
					                <span><i class="icon-folder-open"></i></span>
					                <input type="file" name="userfile" multiple>
					            </span>
				            </button>
          		            <button  type="button" class="btn" id="clear_userpic">
				                <i class="icon-remove"></i>
				            </button>
							<?php echo form_close(); ?>
						</div>
					</div>
					
					<div class="span4">
						<div class="row">
							<div class="span1">
								Компания:	
							</div>
							<div class="span1">
								<input plac type="text" value="" class='input_edit' name='company' id="company" readonly="readonly">
							</div>
						</div>
						<div class="row">
							<div class="span1">
								<p>Телефон:</p>	
							</div>
							<div class="span1">
								<p><input type="text" value="" class='input_edit' name='phone' id="phone" readonly="readonly"></p>	
							</div>
						</div>
						<div class="row">
							<div class="span1">
								<p>Слоган:</p>	
							</div>
							<div class="span1">
								<p><input type="text" value="" class='input_edit' name='slogan' id="slogan" readonly="readonly"></p>
							</div>
						</div>
						<div class="row">
							<div class="span1">
								<p>Э-почта:</p>	
							</div>
							<div class="span1">
								<p><input type="text" value="" class='input_edit' name='email' id='email' readonly="readonly"></p>	
							</div>
						</div>
					</div>
					
					
					<div class="span4">
						<div class="row">
							<div class="span1">
								<p>Ник:</p>	
							</div>
							<div class="span1">
								<p><input type="text" value="" class='input_edit' name='username' id='username' readonly="readonly"></p>	
							</div>
						</div>
						<div class="row">
							<div class="span1">
								<p>Имя:</p>	
							</div>
							<div class="span1">
								<p><input type="text" value="" class='input_edit' name='first_name' id='first_name' readonly="readonly"></p>
							</div>
						</div>
						<div class="row">
							<div class="span1">
								<p>Фамилия:</p>	
							</div>
							<div class="span1">
								<p><input type="text" value="" class='input_edit' name='last_name' id='last_name' readonly="readonly"></p>
							</div>
						</div>
						<div class="row" align="right">
							<div class="span1">
								<p>Пароль:</p>	
							</div>
							<div class="span1">
								<p><input class='input_edit' class="span2" name='password' type="password" readonly="readonly" value="******"></p>	
							</div>
						</div>
						<div class="row">
							<div class="span1">
								<p>&nbsp;</p>	
							</div>
						</div>
						<div class="row">
							<div class="span4">
								<p><button id="delete_user" class="btn pull-right">Удалить аккаунт</button></p>	
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
    <script src="<?php echo $this->config->item('base_url'); ?>assets/js/admin_view.js"></script>
</body>
</html>