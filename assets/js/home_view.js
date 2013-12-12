$(document).ready(function() {
    $('.multiselect').multiselect({
      includeSelectAllOption: true
    });

    $('#clear_userpic').on('click', function (e, data) {
   	 clear_userpic();
   });
    
    $('#fileuploader').fileupload({
        dataType: 'json',
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('.progress .bar').css('width', progress + '%'); },
        done: function (e, data) {
            if(data.result.error != undefined){
            $('#error').html(data.result.error); // выводим на страницу сообщение об ошибке если оно есть        
            $('#error').fadeIn('slow');
            }else{
                 $('#error').hide(); //на случай если сообщение об ошибке уже отображалось
                 $('#files').append("<img class='img-polaroid' style='margin-left:15%;padding:10px;width:auto;height:250px' src=''>");
                 $('#success').fadeIn('slow');
                }
            },
   	     success: function(msg, status){
	    	 console.log(msg);
    	     $.bootstrapGrowl("Файл " + msg.orig_name + " успешно загружен", { type: 'success',
	    	     ele: 'body', 
	    	     align: 'center',
	    	     delay: 300
	    	    	 });
    	     $('#userpic').attr('src', "http://"+ location.hostname + "/assets/img/userpics/"+ msg.file_name);
	     },
        error: function (e, data) {
	    	     $.bootstrapGrowl("Ошибка: " + e.responseText, { type: 'error',
		    	     ele: 'body',
		    	     align: 'center',
		    	     delay: 3000,
		    	     width: 600
		    	    	 });
	    	     console.log(e);
            
        }
    });
});


//Slider init
$('#hide_period_slider').slider().on('slide', function(ev){
    $('#hide_period').val(ev.value);
});

 //Calendar init
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
 
//Load settings
$('#button-settings').on('click', function (e, data) {
	 get_settings();
});

 //Change switches
 $('.label-toggle-switch').on('switch-change', function (e, data) {
		var type = "switch";
		var postData = {
				  value : data.value,
				  name : this.id
				};
	    change_settings(postData, type);
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
 //Loading settings
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
 
 function clear_userpic() {
	var postData = {
			  value : "",
			  name : ""
			};
	 $.ajax({
	     type: "POST",
	     url: "http://"+ location.hostname + "/index.php/settings/clear_userpic/",
	     data: postData ,
	     success: function(msg, status){
	    	 console.log(msg);
    	     $.bootstrapGrowl("Юзерпик очищен", { type: 'success',
	    	     ele: 'body', 
	    	     align: 'center',
	    	     delay: 300
	    	    	 });
    	     $("#userpic").attr("src","http://"+ location.hostname + "/assets/img/userpics/default.png");
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