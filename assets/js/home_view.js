//Multiselect init
$(document).ready(function() {
    $('.multiselect').multiselect({
      includeSelectAllOption: true
    });
});
 
//Slider init
$('#foo').slider().on('slide', function(ev){
    $('#bar').val(ev.value);
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
 
 //Click on inputs
 $('.input_edit').on('click', function (e, data) {
	 $(this).removeAttr('readonly');
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
	    	     delay: 200
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