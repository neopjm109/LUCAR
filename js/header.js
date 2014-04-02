$(document).ready(function(){
	
	/*
	 * 		INDEX.PHP
	 */
	
	$("#car_make").on('change', function(){
		$.post('modelList.php', {
			make:$("#car_make").val()
		}, function(data){
			$("#car_model").html(data);
		});
	});
	
	$("#search").on('click', function(){
		$(".alert").hide();
		
		if ($("#car_make").val() == '0') {
			$(".alert").text("Please choose a make").fadeIn(700);
		} else if ($("#car_year").val() == '0') {
			$(".alert").text("Please choose a year").fadeIn(700);
		} else if ($("#car_model").val() == '0') {
			$(".alert").text("Please choose a model").fadeIn(700);
		} else {
			$("#carSearch").submit();
		}
	});
	
	/*
	 * 		SEARCHRESULT.php
	 */	
	
	$("#car_searchbar > #car_make").on('change', function(){
		$.post('modelList.php', {
			make:$("#car_searchbar > #car_make").val()
		}, function(data){
			$("#car_searchbar > #car_model").html(data);
		});
	});
	
	$("#car_searchbar > #search").on('click', function(){
		$(".alert").hide();
		
		if ($("#car_searchbar > #car_make").val() == '0') {
		} else if ($("#car_searchbar > #car_year").val() == '0') {
		} else if ($("#car_model").val() == '0') {
		} else {
			$.post("carListProc.php", {
				make:$("#car_searchbar > #car_make").val(),
				year:$("#car_searchbar > #car_year").val(),
				model:$("#car_model").val()
			}, function(data) {
				$("#car_list").html(data);
			});
		}
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
