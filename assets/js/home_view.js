$(document).ready(function() {
    $('.multiselect').multiselect({
      includeSelectAllOption: true
    });

    $(function () {
	    $('#fileupload').fileupload({
	        dataType: 'json',
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
	                $('<p/>').text(file.name).appendTo(document.body);
		    	     $.bootstrapGrowl("Файл "+ file.name + " успешно загружен", { type: 'success',
			    	     ele: 'body',
			    	     align: 'center',
			    	     delay: 300
			    	    	 });
	            });
	        },
	        error: function (e, data) {
	    	     $.bootstrapGrowl("Ошибка: " + e + " , " + data, { type: 'error',
		    	     ele: 'body',
		    	     align: 'center',
		    	     delay: 300
		    	    	 });
	    	     console.log(e);
	        },
	    });
	});
});

//Slider init
$('#hide_period_slider').slider().on('slide', function(ev){
    $('#hide_period').val(ev.value);
});

 //Clandar init
$('#reportrange').daterangepicker(
		    {
		      ranges: {
		         'Сегодня': [moment(), moment()],
		         'Вчера': [moment().subtract('days', 1), moment().subtract('days', 1)],
		         'Последние 7 дней': [moment().subtract('days', 6), moment()],
		         'Последние 30 дней': [moment().subtract('days', 29), moment()],
		         'Этот месяц': [moment().startOf('month'), moment().endOf('month')],
		         'Последний месяц': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
		      },
		      startDate: moment().subtract('days', 29),
		      endDate: moment()
		    },
		    function(start, end) {
		        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		    }
		);
 
 
 //Change switches
 $('.label-toggle-switch').on('switch-change', function (e, data) {
		var type = "switch";
		var postData = {
				  value : data.value,
				  name : this.id
				};
	    change_settings(postData, type);
 });
 
 //Change switches
 $('#button-settings').on('click', function (e, data) {
	 get_settings();
 });
 
 //Click on inputs
 $('.input_edit').on('click', function (e, data) {
	 $(this).removeAttr('readonly');
	 if (this.name == "password") 
	 {
		 this.type = "text";
	 }
 });
 //Change inputs
 $('.input_edit').on('change', function (e, data) {
	 	var name = this.name;
	 	var value = this.value;
	 	var type = "input";
	    var postData = {
				  value : value,
				  name : name
				};
	    //alert(name + value + type);
	    change_settings(postData, type);

	    $('[name="' + name + '"]').prop("readonly",true);
 });
 //Leave inputs
 $('.input_edit').on('blur', function (e, data) {
	 $(this).prop("readonly",true);
	 if (this.name == "password") 
	 {
		 $(this).prop("type","password");
	 }
 }); 
 
 //
 //Changing function
 //
 function change_settings(postData, type) {
	 $.ajax({
	     type: "POST",
	     url: "http://"+ location.hostname + "/index.php/settings/change/" + type,
	     data: postData ,
	     success: function(msg, status){
	    	 console.log(msg);
    	     $.bootstrapGrowl(msg, { type: 'success',
	    	     ele: 'body', 
	    	     align: 'center',
	    	     delay: 300
	    	    	 });
	     },
	     error: function (msg, status){
    	     $.bootstrapGrowl(msg, { type: 'error',
	    	     ele: 'body', 
	    	     align: 'center',
	    	     delay: 4000
	    	    	 });
	     }
	});
}
 
 //
 //Changing function
 //
 function get_settings() {
     var switches = ["position_mode", "hyst"];
     var inputs = ["hide_period", "company", "phone", "slogan", "username", "first_name", "last_name", "email"];
     var images = ["userpic"];
     var value;
		 $.getJSON("http://"+ location.hostname + "/index.php/settings/get", function(data) {  
	         $.each(data, function(key, val) {   
	            console.log( key + " = " + val);
	         });
	         
	         //console.log("position mode = " + data["position_mode"]);
	     switches.forEach(function(entry) {
	    	 value = data[entry];
			if (value == 0)
				{
				value = false;
				}
			else
				{
				value = true;
				}
			$('#' + entry).bootstrapSwitch('setState', value);
    	 });
	     
	     inputs.forEach(function(entry) {
	    	 value = data[entry];
	    	 $('#' + entry).prop("value",value);
	     	}
		 );
	     
	     images.forEach(function(entry) {
	    	 value = data[entry];
	    	 $('#' + entry).prop("value",value);
	    	 $("#userpic").attr("src","http://"+ location.hostname + "/assets/img/userpics/"+ value);
	     	}
		 );
	     
     });
}