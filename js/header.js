$(document).ready(function() {

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

	$("#car_make").on('change', function() {
		$.post('modelList.php', {
			make : $("#car_make").val()
		}, function(data) {
			$("#car_model").html(data);
		});
	});

	$("#search").on('click', function() {
		$(".alert").hide();

		if ($("#car_make").val() == '0') {
			$(".alert").text("Please choose a make").fadeIn(700);
		} else if ($("#car_year").val() == '0') {
			$(".alert").text("Please choose a year").fadeIn(700);
		} else {
			$("#carSearch").submit();
		}
	});

	/*
	 * SEARCHRESULT.php
	 */

	$("#car_searchbar > #car_make").on('change', function() {
		$.post('modelList.php', {
			make : $("#car_searchbar > #car_make").val()
		}, function(data) {
			$("#car_searchbar > #car_model").html(data);
		});
	});

	$("#car_searchbar > #search").on('click', function() {
		$(".alert").hide();

		if ($("#car_searchbar > #car_make").val() == '0') {
		} else if ($("#car_searchbar > #car_year").val() == '0') {
		} else {
			$.post("carListProc.php", {
				make:$("#car_searchbar > #car_make").val(),
				year:$("#car_searchbar > #car_year").val(),
				code:$("#car_model").val()
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

	/*
	 * login.php
	 */

	$("#login").on('click', function() {
		$(".alert").hide();

		if ($("#loginID").val() == '') {
			$(".alert").text("Please fill the ID").fadeIn(700);
		} else if ($("#loginPW").val() == '') {
			$(".alert").text("Please fill the PW").fadeIn(700);
		} else {
			$.post("loginProc.php", {
				ID : $("#loginID").val(),
				PW : $("#loginPW").val(),
			}, function(data) {
				$(".alert").text(data).fadeIn(700);
			});
		}
	});
	
	
	/*
	 *  signup.php
	 */
	
	$("#signUp").on('click', function() {
		$(".alert").hide();

		if ($("#signID").val() == '') {
			$(".alert:nth-of-type(1)").fadeIn(700);
		}
		if ($("#signPW").val() == '') {
			$(".alert:nth-of-type(2)").fadeIn(700);
		}
		if ($("#signPWCheck").val() == '') {
			$(".alert:nth-of-type(3)").fadeIn(700);
		}
		if ($("#signName").val() == '') {
			$(".alert:nth-of-type(4)").fadeIn(700);
		}
		if ($("#signName").val() == '') {
			$(".alert:nth-of-type(5)").fadeIn(700);
		} else {
			$.post("loginProc.php", {
				ID : $("#loginID").val(),
				PW : $("#loginPW").val(),
			}, function(data) {
				$(".alert").text(data).fadeIn(700);
			});
		}
	});
	
	
	
});
