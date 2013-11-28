function get_cookie ( cookie_name )
{
  var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );
 
  if ( results )
    return ( unescape ( results[2] ) );
  else
    return null;
}

$(document).ready(function() {
    $('.multiselect').multiselect({
      includeSelectAllOption: true
    });
  });
 
 $('#foo').slider()
 .on('slide', function(ev){
    $('#bar').val(ev.value);
 });
 
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
 
 $('#label-toggle-switch').on('click', function(e, data) {
     $('.label-toggle-switch').bootstrapSwitch('toggleState');
 });
 $('.label-toggle-switch').on('switch-change', function (e, data) {
	    //alert(data.value);	 
	 var postData = {
			  what : data.value,
			  where : 'position_mode'
			};
	 
	 $.ajax({
	     type: "POST",
	     url: "http://"+ location.hostname + "/index.php/settings/change",
	     data: postData , //assign the var here
	     success: function(msg, status){
	    	 console.log(msg);
	    	 ;
	     }
	});
 });