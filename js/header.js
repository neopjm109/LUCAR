$(document).ready(function(){
	$("#search").on('click', function(){
		$("#carSearch").submit();
	});
	
	$("div.column").on('click', function(){
		$.post("carPageProc.php", {
			car_num:$(this).find("#carNum").val()
		}, function(data){
			$("#car_page").html(data);
		});
		$("#car_page").css("display", "block");
	});
});
