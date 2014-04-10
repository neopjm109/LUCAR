$(document).ready(function() {

	/*
	 * 		KEY FUNCTION
	 */

	$(this).on('keyup', function(e) {
		if (e.keyCode = 27) {
			if ($("#car_page").css("display") == "block") {
				$("#car_page").animate({width:"0%", height:"0%"});
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
	 * 		SEARCHRESULT.php
	 */

	$("#result_make").on('change', function() {
		$.post('modelResultList.php', {
			make : $("#result_make > input[type='radio']:checked").val()
		}, function(data) {
			$("#car_searchbar > #result_model").html(data);
		});

		$.post("carListProc.php", {
			make : $("#result_make > input[type='radio']:checked").val(),
			year : $("#result_year").val(),
		}, function(data) {
			$("#car_list").html(data);
		});
		
	});

	$("#result_year").on('change', function() {

		$.post("carListProc.php", {
			make : $("#result_make > input[type='radio']:checked").val(),
			year : $("#result_year").val(),
			code : $("#result_model > input[type='radio']:checked").val()
		}, function(data) {
			$("#car_list").html(data);
		});
	});

	$("#result_model").on('change', function() {
		$.post("carListProc.php", {
			make : $("#result_make > input[type='radio']:checked").val(),
			year : $("#result_year").val(),
			code : $("#result_model > input[type='radio']:checked").val()
		}, function(data) {
			$("#car_list").html(data);
		});
	});

	$("#result_trans > input[type='checkbox']").on('change', function() {

		var $checkboxes = $("#result_trans > input[type='checkbox']");
		var count= $checkboxes.length;
		var transArr = new Array();
		
		for (var i=0; i<count; i++) {
			if( $checkboxes.eq(i).prop("checked") == true) {
				transArr.push($checkboxes.eq(i).val());
			}
		}
		
		if( transArr.length == 0) {
			$.post("carListProc.php", {
				make : $("#result_make > input[type='radio']:checked").val(),
				year : $("#result_year").val(),
				code : $("#result_model > input[type='radio']:checked").val()
			}, function(data) {
				$("#car_list").html(data);
			});
		} else {
			$.post("carListProc.php", {
				make : $("#result_make > input[type='radio']:checked").val(),
				year : $("#result_year").val(),
				code : $("#result_model > input[type='radio']:checked").val(),
				trans: transArr
			}, function(data) {
				$("#car_list").html(data);
			});
		}
	});
	
	$("#result_color input[type='radio']").on('click', function(){
		if ( $(this).prop("checked") == true ) {
			$.post("carListProc.php", {
				make : $("#result_make > input[type='radio']:checked").val(),
				year : $("#result_year").val(),
				code : $("#result_model > input[type='radio']:checked").val(),
				color: $(this).val()
			}, function(data) {
				$("#car_list").html(data);
			});
		}
	});

	$("#car_list").on('click', 'div.column', function() {
		$.post("carPageProc.php", {
			sell_num : $(this).find("#sellNum").val()
		}, function(data) {
			$("#car_page").html(data);
		});
		$("#car_page").animate({width:"80%", height:"50%"});
		$("#black_overlay").show();
	});

	$("#car_page").on('click', '#car_page_close', function() {
		$("#car_page").animate({width:"0%", height:"0%"});
		$("#black_overlay").hide();
	});

	/*
	 * 		login.php
	 */

	
	$('#loginID').on('keypress', function(event) {
		if( event.keyCode == 13 ){
			loginPostCheck();
		}
	});
	$('#loginPW').on('keypress', function(event) {
		if( event.keyCode == 13 ){
			loginPostCheck();
		}
	});
	
	$("#login").on('click', function() {
		loginPostCheck();
	});
	
	function loginPostCheck(){
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
				if(data == false){
					$(".alert").text("Please check your Email or Password").fadeIn(700);
				}
				else{
					$("#formLogin").submit();
				}
			});
		}
	}

	/*
	 * 		signup.php
	 */
	
	$('#signID').on('keypress', function(event) {
		if( event.keyCode == 13 ){
			signupPostCheck();
		}
	});

	$('#signPW').on('keypress', function(event) {
		if( event.keyCode == 13 ){
			signupPostCheck();
		}
	});
	
	$('#signPWCheck').on('keypress', function(event) {
		if( event.keyCode == 13 ){
			signupPostCheck();
		}
	});
	
	$('#signName').on('keypress', function(event) {
		if( event.keyCode == 13 ){
			signupPostCheck();
		}
	});
	
	$('#signPhone').on('keypress', function(event) {
		if( event.keyCode == 13 ){
			signupPostCheck();
		}
	});

	$("#signUp").on('click', function() {
		signupPostCheck();
	});
	
	function signupPostCheck(){
		$(".alert").hide();
		
		var count = 0;
		
		if ($("#signID").val() == '') {
			$(".alert:nth-of-type(1)").fadeIn(700);
			count++;
		}else if(checkEmailFormat() == false){
			$(".alert:nth-of-type(1)").text("Email format is not").fadeIn(700);
			count++;
		}
		else{
			$.ajaxSetup({
				async: false
				});
			$.post("singupEmailDuplicationCheckProc.php", {
				Email : $("#signID").val(),
			}, function(data) {
				if(data == false){
					$(".alert:nth-of-type(1)").text("Email already exist").fadeIn(700);
					count++;
				}
			});
			$.ajaxSetup({
				async: true
				});
		}
		
		if ($("#signPW").val() == '') {
			$(".alert:nth-of-type(2)").fadeIn(700);
			count++;
		}
		
		if ($("#signPWCheck").val() == '') {
			$(".alert:nth-of-type(3)").fadeIn(700);
			count++;
		} else if(checkPassword() == false){
			$(".alert:nth-of-type(3)").text("Please check a password").fadeIn(700);
			count++;
		}
		
		if ($("#signName").val() == '') {
			$(".alert:nth-of-type(4)").fadeIn(700);
			count++;
		}
		
		if ($("#signPhone").val() == '') {
			$(".alert:nth-of-type(5)").fadeIn(700);
			count++;
		}

		if (count == 0) {
			$.post("signupProc.php", {
				Email : $("#signID").val(),
				Password : $("#signPW").val(),
				Name : $("#signName").val(),
				Phone : $("#signPhone").val(),
			}, function(data) {
				$(".alert:nth-of-type(6)").text(data).fadeIn(700);
			});
		}
	}
	
	function checkEmailFormat(){
		
		 var use_email = $('#signID').val();
		 var regExp =
			 /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

		 if(!regExp.test(use_email)) {
			 $('#signID').focus();
			 return false;
		 }else{
			 return true;
		 }
	}
	
	function checkPassword(){
		var pw1 = $("#signPW").val();
		var pw2 = $("#signPWCheck").val();
		
		if(pw1 != pw2){
			return false;
		}else{
			return true;
		}
	}
	

	/*
	 * 		For Seller.php
	 */
	
	$("#sellMake").on('change', function() {
		$.post('modelList.php', {
			make : $("#sellMake").val()
		}, function(data) {
			$("#sellModel").html(data);
		});
	});
	
	$("#registerSell").on('click', function() {
		registerSellPostCheck();
	});
	
	function registerSellPostCheck(){
		$(".alert").hide();
		count = 0;
		
		if ($("#sellTitle").val() == '') {
			$(".alert:nth-of-type(1)").fadeIn(700);
			count++;
		}
		/*
		if ($("#sellMake option").index($("#sellMake option:selected")) == 0) {
			$(".alert:nth-of-type(3)").fadeIn(700);
			count++;
		}
		
		
		if ($("#sellMileage").val() == '') {
			$(".alert:nth-of-type(5)").fadeIn(700);
			count++;
		}
		*/
		/*
		$SellTitle;
$SellerID;
$Model;
$SellYear;
$Color;
$SellPrice = $_REQUEST ['Price'];
$SellTransmission = $_REQUEST ['Transmission'];
$SellMileage = $_REQUEST ['Mileage'];
$SellDescription = $_REQUEST ['Description'];
$Date = $_REQUEST['Date'];
$Report;
		*/
		$.ajaxSetup({
			async: false
			});
		if(count == 0){
			$Date = getNowTime();
			$.post("sellerProc.php", {
				Title : $("#sellTitle").val(),
				Year : $("#sellYear option:selected").val(),
				Model : $("#sellModel option:selected").val(),
				Mileage : $("#sellMileage").val(),
				Price : $("#sellPrice").val(),
				Transmission : $("#sellTransmission").val(),
				Description : $("#sellDescription").val(),
				Date : $Date
			}, function(data) {
				if(data){
					$.post("sell_photoProc.php", {
						Title : $("#sellTitle").val(),
						Year : $("#sellYear option:selected").val(),
						Model : $("#sellModel option:selected").val(),
						Mileage : $("#sellMileage").val(),
						Price : $("#sellPrice").val(),
						Transmission : $("#sellTransmission").val(),
						Description : $("#sellDescription").val(),
						Date : $Date
					}, function(data) {
						$(".alert:nth-of-type(1)").text(data).fadeIn(700);
					});
				}
			});
		}
		$.ajaxSetup({
			async: true
			});
	}
	
	/*
	 *  etcFunction
	 */
	
	//get Date
	function getNowTime(){
		 var now = new Date();
		 
		 var Year = now.getFullYear();
		 var Month = (now.getMonth()+1) > 9 ? ''+(now.getMonth()+1) : '0'+(now.getMonth()+1);
		 var Day = (now.getDate()) > 9 ? ''+(now.getDate()) : '0'+(now.getDate());
		 var Hour = (now.getHours()) > 9 ? ''+(now.getHours()) : '0'+(now.getHours());
		 var Minutes = (now.getMinutes()) > 9 ? ''+(now.getMinutes()) : '0'+(now.getMinutes());
		 var Second = (now.getSeconds()) > 9 ? ''+(now.getSeconds()) : '0' + (now.getSeconds());
		 
		 var nowTime = Year+'-'+Month+'-'+Day+' '+
		 				Hour + ':' + Minutes + ':' + Second;
	      return nowTime;
	}

});
