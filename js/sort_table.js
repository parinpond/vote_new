$(document).ready(function(){
    $( "i" ).css('cursor','pointer');
    $( "i" ).click(function() {
	    var column_id = $(this).data('column-id');
	    var order     = $(this).data('order');
	    var table     = $(this).data('table');
	    var rows      = $('table#'+table+' tbody tr').get();
    console.log('column_id='+column_id+'order='+order);
        rows.sort(function(a,b) {
	        var A = $(a).children('td').eq(column_id).text().toUpperCase();
	        var B = $(b).children('td').eq(column_id).text().toUpperCase();
	        if(order == 'asc'){
	            if(A < B) {
	                return -1;
	            }
	            if(A > B) {
	                return 1;
	            }
	        }else{ //desc
	            if(A > B) {
	                return -1;
	            }
	            if(A < B) {
	                return 1;
	            }
	        }
	        return 0;
    	});
	    $.each(rows, function(index,row) {
	        $('#'+table).children('tbody').append(row);
	    }); 

    }); 
});