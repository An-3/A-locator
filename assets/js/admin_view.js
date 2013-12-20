$(document).ready(function() {
    $('.multiselect').multiselect({
        includeSelectAllOption: true
      });
});

$("#salary").blur(function(){
	   $(this).parseNumber({format:"#,###.00", locale:"us"});
	   $(this).formatNumber({format:"#,###.00", locale:"us"});
	});