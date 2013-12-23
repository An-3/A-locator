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
});