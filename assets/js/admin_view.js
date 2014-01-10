$(document).ready(function() {
	
    $('.multiselect').multiselect({
        includeSelectAllOption: true
      });
    $("#SliderSingle").slider({
    	from: 0,
    	to: 10,
    	step: 1.0,
    	round: 1,
    	format: { format: '##', locale: 'ru' },
    	dimension: '&nbsp;шт',
    	skin: "plastic",
    	scale: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    		});
    $("#SliderSingle").change(function() {
    	console.log($("#SliderSingle").slider("value"));
    	});

    $('#create_invites').on('click', function (e, data) {
    	create_invites();
    });
    
    $("#allInvitesTable").tablesorter();
});



function create_invites() {
	var user_array = [];
	$('#user_list option:selected').each(function() {
		user_array.push($(this).val());
      });
    
	var postData = {
			  users : user_array,
			  number : $("#SliderSingle").slider("value")
			};
	 $.ajax({
	     type: "POST",
	     url: "http://"+ location.hostname + "/index.php/admin/create_invites",
	     dataType: 'json',
	     data: postData ,
	     success: function(msg, status){
	    	 console.log(msg);
	    	 console.log(msg[0][19][1]);
	    	 
	   	     $.bootstrapGrowl("Создано", { type: 'success',
		    	     ele: 'body', 
		    	     align: 'center',
		    	     delay: 300
		    	    	 });
	     },
	     error: function (e, data) {
	    	 alert(JSON.stringify(error));
		     $.bootstrapGrowl("Ошибка: " + e.responseText, { type: 'error',
	    	     ele: 'body',
	    	     align: 'center',
	    	     delay: 3000,
	    	     width: 600
	    	    	 });
	        }
	});	 
}