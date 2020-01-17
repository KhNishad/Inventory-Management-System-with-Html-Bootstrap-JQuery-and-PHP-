$(document).ready(function(){
	var DOMAIN = "http://localhost/inventory_project2/public_html";

	
	$("#register_form").on("submit",function(){
		var status = false;
		var name = $("#username");
		var email = $("#email");
		var pass1 = $("#password1");
		var pass2 = $("#password2");
		var type = $("#usertype");
		
		var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
		if(name.val() == "" || name.val().length <= 2){
			name.addClass("border-danger");
			$("#u_error").html("<span class='text-danger'>Name should be more than 2 char</span>");
			status = false;
		}else{
			name.removeClass("border-danger");
			$("#u_error").html("");
			status = true;
		}
		if(!e_patt.test(email.val())){
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter Valid Email Address</span>");
			status = false;
		}else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}
		if(pass1.val() == "" || pass1.val().length < 5){
			pass1.addClass("border-danger");
			$("#p1_error").html("<span class='text-danger'>Please Enter more than 5 digit password</span>");
			status = false;
		}else{
			pass1.removeClass("border-danger");
			$("#p1_error").html("");
			status = true;
			
		}
		if(pass2.val() == "" || pass2.val().length < 5){
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Please Enter more than 5 digit password</span>");
			status = false;
		}else{
			pass2.removeClass("border-danger");
			$("#p2_error").html("");
			status = true;
			
		}
		if(type.val() == ""){
			type.addClass("border-danger");
			$("#t_error").html("<span class='text-danger'>Please Enter more than 5 digit password</span>");
			status = false;
		}else{
			type.removeClass("border-danger");
			$("#t_error").html("");
			status = true;
		}
		if ((pass1.val() == pass2.val()) && status == true) {
			
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#register_form").serialize(),
				success : function(data){
					
					if (data == "EMAIL_ALREADY_EXISTS") {
						
						alert("It seems like you email is already used");
					}else if(data == "SOME_ERROR"){
						
						alert("Something Wrong");
					}else{
						
						window.location.href = encodeURI(DOMAIN+"/index.php?msg=You are registered Now you can login");
					}
				}
			})
		}else{
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Password is not matched</span>");
			status = true;
		}
	})

	//For Login Part
	$("#form_login").on("submit",function(){
		var email = $("#log_email");
		var pass = $("#log_password");
		var status = false;
		if (email.val() == "") {
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter Email Address</span>");
			status = false;
		}else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}
		if (pass.val() == "") {
			pass.addClass("border-danger");
			$("#p_error").html("<span class='text-danger'>Please Enter Password</span>");
			status = false;
		}else{
			pass.removeClass("border-danger");
			$("#p_error").html("");
			status = true;
		}
		if (status) {
		
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#form_login").serialize(),
				success : function(data){
					 
					if (data == "NOT_REGISTERD") {
						email.addClass("border-danger");
						$("#e_error").html("<span class='text-danger'>It seems like you are not registered</span>");
					}else if(data == "PASSWORD_NOT_MATCHED"){
						pass.addClass("border-danger");
						$("#p_error").html("<span class='text-danger'>Please Enter Correct Password</span>");
						status = false;
					}else if(data == "Other"){
						
						
						window.location.href = DOMAIN+"/userpage.php";
					}
					else{
						
						window.location.href = DOMAIN + "/dashboard.php";
					}
				}
			})
		}
	})

	//Fetch category
	fetch_category();
	function fetch_category(){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {getCategory:1},
			success : function(data){
				var root = "<option value='0'> ROOT</option>";
				var chose = "<option value='0'> Choose Category</option>";
				$("#parent_cat").html(root+data);
				$("#select_cat").html(chose+data);
			}
		})
	}

	// fetch brands
	fetch_brand();
	function fetch_brand() {
		$.ajax({
			url: DOMAIN + "/includes/process.php",
			method: "POST",
			data: { getbrand: 1 },
			success: function (data) {
				
			
				var chose = "<option value='0'>Choose Brand</option>";
				
				$("#select_brand").html(chose + data);
			}
		})
	}

	

	//Add Category
	$("#category_form").on("submit",function(){
		if ($("#catagory_name").val() == "") {
			$("#catagory_name").addClass("border-danger");
			$("#cat_error").html("<span class='text-danger'>Please Enter Category Name</span>");
		}else{
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data  : $("#category_form").serialize(),
				success : function(data){
					if (data == "catagory_added")
					{
						$("#catagory_name").addClass("border-success");
						$("#cat_error").html("<span class='text-success'>New category Added</span>");
						$("#catagory_name").val("");
						fetch_category();
					}
					else{
						alert(data);
					}
				
				}
			})
		}
	})

	// add brand
	$("#brand_form").on("submit",function () {
		if($("#brand_name").val() == ""){
			$("#brand_name").addClass("border-danger");
			$("#brand_error").html("<span class='text-danger'>Add A Brand Name</span>");
			
		}
		else{
			$.ajax({
				url: DOMAIN+"/includes/process.php",
				method:"POST",
				data :$("#brand_form").serialize(),
				success :function (data) {
					if (data == "brand_added")
					{
						$("#brand_name").addClass("border-success");
						$("#brand_error").html("<span class='text-success'>New Brand Added</span>");
						$("#brand_name").val("");
						fetch_brand();
					}
					else
					{
						alert(data);
					}
				
				}
			})
		}
		
	})
	// add product
	$("#product_form").on("submit",function() {
		$.ajax({
			url: DOMAIN + "/includes/process.php",
			method: "POST",
			data: $("#product_form").serialize(),
			success: function (data) {
				if (data == "Product_added") {
					alert("Product Added")
					$("#product_name").val("");
					$("#product_price").val("");
					$("#product_qty").val("");
					
					
					
				}
				else {
					console.log(data);
					alert(data);
				}

			}
		})
	})




})