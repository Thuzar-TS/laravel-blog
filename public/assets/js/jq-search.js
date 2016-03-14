$(document).ready(function(){
	 $( "#cityselect" ).change(function() {

	 	var data= $("#set-up-form").serialize();

	 	$("#listdata").append(data+"&");
	 	
/*	 	var cityvalue = $(this).val();
	 	if(cityvalue !== '') {
	 		$.get('search-select.php?table=doctor&&searchData='+cityvalue, function(returnData) {
	 			if (!returnData) {
			                      $('#results').html('<p style="padding:5px;">Search term entered does not return any data.</p>');
			           } else {
			                      $('#results').html(returnData);
			           }
	 		})
	 	}*/
	 }) ;
});