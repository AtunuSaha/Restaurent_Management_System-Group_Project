<!DOCTYPE html>
<html>
<head>
	<style>
		html,body {
		  background-color: #ffffff;
		  font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
		}
		

		a {
			
			color: black;
			margin-left: 70px;
			padding: 10px;
			background-color: #F4F4F4;
		}

		.header {

			color: black;
			background-color: #F4F4F4;
			padding: 30px;
			text-align: left;

		}

		.login-container {
			display: flex;
			flex-direction: column;
			gap: 12px;
			border: 1px solid #888;
			width: 350px;
			margin: 0px auto;
			padding: 15px;
		}
		.form {
			display: flex;
			flex-direction: column;
			gap: 7px;
		}

		.login-section {
			display: flex;
			flex-direction: column;
			gap: 7px;
		}
		

		button,input {
			height: 27px;
			outline: none;
		}


		
	</style>

	<title>Login</title>
</head>
<body>
	<h1 class="header">Welcome to Resturant Management System <br> </h1>
	
	<div class="login-container">
		<form onsubmit="onSubmit(event)" name="loginForm" class="form" method="post" action="../Contollers/logCheckController.php">
				<div class="login-section">
					<label> Username </label>
					<input id="userName" type="text" name="id" id="id" />
				</div>
				<div class="login-section">
					<label for="password">Password</label>
					<input id="pass" type="password" name="pass" id="password">
				</div>
				<button class="login-button">Login</button>
		</form>
	</div>


	<script>


		function isAlhaNumeric(char) {
			return (char>=65 && char<=90) || (char >=97 && char <= 127) || (char >=48 && char<=57);
		}
		const form = document.forms.loginForm;
		function validate() {
			let x = document.getElementById("userName").value;
			if(!x) {
				alert("Username must not be empty");
				return false;
			}
			let password = document.getElementById("pass").value;
			if (!password){
				alert("Password must not be empty");
				return false;
			}
			let isUnsupportedCharacter = false;
			for (let index = 0; index < x.length; index++) {
				const characterCode = x.charCodeAt(index);
				if(!isAlhaNumeric(characterCode)) {
					isUnsupportedCharacter = true;
					break;
				}
			}

			if(isUnsupportedCharacter) {
				alert("Only alpha-numeric characters are supported");
				return false;
			}



			return true;
		}
		function onSubmit(e) {
			e.preventDefault();
			const valid = validate();
			console.log("IS VALID", valid);
			if(valid) {
				form.submit();
			}
		}

		<?php
		if (isset($_GET["error"])) {
			echo 'alert("Wrong Caredential!");window.location.href="/MVC/Views/login.php"';
		} 
		 ?>
    </script> 

</body>
</html>