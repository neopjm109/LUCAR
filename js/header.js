$(document).ready(function(){
	
	/*
	 * 		KEY FUNCTION
	 */
	
	$(this).on('keyup', function(e){
		if( e.keyCode = 27) {
			if ( $("#car_page").css("display") == "block") {
				$("#car_page").hide();
				$("#black_overlay").hide();
			}
		}
	});
	
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

	$("#car_list").on('click', 'div.column', function(){
		$.post("carPageProc.php", {
			sell_num:$(this).find("#sellNum").val()
		}, function(data){
			$("#car_page").html(data);
		});
		$("#car_page").show();
		$("#black_overlay").show();
	});
	
	$("#car_page").on('click', '#car_page_close', function() {
		$("#car_page").hide();
		$("#black_overlay").hide();
	});
	
});
