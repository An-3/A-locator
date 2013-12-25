<div class="container">
	<div class="row">
		<div class="span8">
			<ul class="nav nav-pills">
				<li class="active">
			    	<a href="#">Новые</a>
				</li>
				<li>
			  		<a href="#">По дате</a>
		  		</li>
				<li>
			  		<a href="#">По пользователям</a>
		  		</li>
			</ul>
		</div>
		<div class="span4">
			<form class="form-search pull-right">
			  <input type="text" class="input-medium search-query">
			  <button type="submit" class="btn"><i class="icon-search"></i></button>
			</form>
		</div>
		
	</div>
	<div class="row">
		<div class="alert">
			<div id="invite_info">
				Выберите, пожалуйста, пользователей и кол-во приглашений, после этого нажмите «Создать».
			</div>
		</div>
	</div>
	<div class="row">
		<div class="span4">
			<div class="layout">
				<div class="layout-slider">
					<input id="SliderSingle" type="slider" name="price" value="20" />
				</div>
			</div>
		</div>
		<div class="span6">
			Для:
			<select class="multiselect" multiple="multiple">
				<?php
					foreach ($users as $user)
					{
						$val_id = $user['id'];
						if (!$user['first_name'] && !$user['last_name'])
						{
							$delimeter = "";
						} else {
							$delimeter = " — ";
						}
							
						$val_text = $user['first_name']." ".$user['last_name'].$delimeter.$user['username'];
						$element = "<option value=".$val_id.">".$val_text."</option>";
						echo $element."\n"; 
					}
				?>
			</select>
		</div>
		<div class="span1">
			<button class="btn">Создать</button>
		</div>

	</div>
</div>