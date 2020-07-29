$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
	$(".DetailSummaryModal").click(function() {
		var user_id =$(this).data('id');
		var check_flag=$("tbody#detail_summary_table"+user_id+" >tr").data('flag');
		
		if(user_id != "" && check_flag != "1"){
			$.ajax({ 
				url :'/vote/ajax/detail_summary',  
				data: {user_id : user_id,},
				success: function(result) { 
					var i=0;
					$.each(JSON.parse(result), function(index,row) {
					 i++;
						var $tr = $("<tr data-flag='1'>").append(
						$('<td>').text(i),
						$('<td>').text(row.name_vote_user),
						$('<td>').text(row.comment),
						$('<td>').text(row.create_date)
						).appendTo('tbody#detail_summary_table'+row.user_id);
						$tr.html();
					});
				}
			}); 
		}
	
	});
	if(data_chart != null){
		var chart_name_user =[];
		var chart_total_point =[];
		var i =0;
		$.each(data_chart, function(index,row) { 
			chart_name_user[i] =  row.name_vote_user;
			chart_total_point[i] = row.count;
			i++;
		});
		myChart (chart_name_user,chart_total_point);
	}else{
		var c = document.getElementById("myChart");
		var ctx = c.getContext("2d");
		ctx.font = "12px Arial";
		ctx.fillText("No data.",50, 50);
	}
	
    function myChart (chart_name_user,chart_total_point){
		var ctx = $('#myChart');
		if(chart_name_user != "" && chart_total_point != "" ){
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: chart_name_user,
					datasets: [{
						label: '# of Votes',
						data: chart_total_point,
						backgroundColor:'rgba(54, 162, 235, 0.2)',
						borderColor:'rgba(54, 162, 235, 1)',
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								stepSize: 1,
							}
						}]
					}
				}
			});
		}
    }	 
	
});