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
			<select class="multiselect" multiple="multiple" id="user_list">
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
			<button class="btn btn-success" id="create_invites">Создать</button>
		</div>

	</div>
	<div class="row">

	<table id="allInvitesTable" class="tablesorter tablesorter-blue">
		<colgroup>
			<col style="width: 3%;">
			<col style="width: 10%;">
			<col style="width: 20%;">
			<col style="width: 20%;">
			<col style="width: 47%;">
		</colgroup>
		<thead>
			<tr class="tablesorter-headerRow">
				<th data-column="0" class="tablesorter-header tablesorter-headerAsc" tabindex="0" unselectable="on" style="-webkit-user-select: none;"><div class="tablesorter-header-inner">№</div></th>
				<th data-column="1" class="tablesorter-header" tabindex="0" unselectable="on" style="-webkit-user-select: none;"><div class="tablesorter-header-inner">Пользователь</div></th>
				<th data-column="2" class="tablesorter-header tablesorter-headerDesc" tabindex="0" unselectable="on" style="-webkit-user-select: none;"><div class="tablesorter-header-inner">Имя</div></th>
				<th data-column="3" class="tablesorter-header" tabindex="0" unselectable="on" style="-webkit-user-select: none;"><div class="tablesorter-header-inner">Фамилия</div></th>
				<th data-column="4" class="tablesorter-header" tabindex="0" unselectable="on" style="-webkit-user-select: none;"><div class="tablesorter-header-inner">Инвайт</div></th>
			</tr>
		</thead>
		<tbody>
			<tr class="odd">
				<td>1</td>
				<td>Bruce</td>
				<td>Almighty</td>
				<td>45</td>
				<td>$153.19</td>
			</tr>
			<tr class="even">
				<td>2</td>
				<td>Clark</td>
				<td>Kent</td>
				<td>18</td>
				<td>$15.89</td>
			</tr>
			<tr class="odd">
				<td>3</td>
				<td>Bruce</td>
				<td>Evans</td>
				<td>22</td>
				<td>$13.19</td>
			</tr>
			<tr class="even">
				<td>4</td>
				<td>Peter</td>
				<td>Parker</td>
				<td>28</td>
				<td>$9.99</td>
			</tr>
			<tr class="odd">
				<td>5</td>
				<td>Bruce</td>
				<td>Evans</td>
				<td>22</td>
				<td>$13.19</td>
			</tr>
			<tr class="even">
				<td>6</td>
				<td>John</td>
				<td>Hood</td>
				<td>33</td>
				<td>$19.99</td>
			</tr>
			</tbody>
	</table>
	
	
	</div>
</div>