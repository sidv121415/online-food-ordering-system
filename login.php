<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="login.css" />
	<title>Login/Register</title>
	<style>
		/* Eye Toggle Icon Styles */
.input-field .fa-eye,
.input-field .fa-eye-slash {
    position: absolute;
    right: 10px;
    cursor: pointer;
    color: #007bff;
    transition: color 0.3s ease;
}

.input-field .fa-eye:hover,
.input-field .fa-eye-slash:hover {
  color: #0056b3;
}
	</style>
</head>

<body>

	<?php
	include_once("navbar.php");
	?>

	<div class="container">
		<div class="forms-container">
			<div class="signin-signup">
				<form action="dblogin.php" class="sign-in-form" method="POST">
					<h2 class="title">Sign in</h2>
					<div class="input-field">
						<i class="fas fa-envelope"></i>
						<input type="email" placeholder="Email" name="email" required onkeyup="hideAlertBox()" />
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" id="loginPassword" placeholder="Password" name="password" required onkeyup="hideAlertBox()" />
						<i class="fas fa-eye-slash" id="toggleLoginPassword" style="cursor: pointer;"></i>
					</div>
					<input type="submit" value="Login" class="submit solid" id="loginButton" />
					<button class="btn btn-sty" id="sign-up-btn">
						New User? Sign up
					</button>

					<?php

					if (isset($_GET['error'])) {
						echo ('
	        <div class="alert alert-danger" id="alertbox" role="alert">
	        Email or Password is incorrect.
          </div>');
					}

					?>

				</form>
				<form action="dbregister.php" class="sign-up-form" method="POST" id="registerForm">
					<h2 class="title">Sign up</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" placeholder="First Name" name="firstName" onkeyup="hideAlertBox()" required />
					</div>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" placeholder="Last Name" name="lastName" onkeyup="hideAlertBox()" required />
					</div>
					<div class="input-field">
						<i class="fas fa-envelope"></i>
						<input type="email" placeholder="Email" name="email" onkeyup="hideAlertBox()" required />
					</div>
					<div class="input-field">
						<i class="fas fa-phone" style="transform: rotate(90deg);"></i>
						<input type="text" placeholder="Contact No" name="contact" onkeyup="hideAlertBox()" required />
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" id="registerPassword" placeholder="Password" name="password" required onkeyup="hideAlertBox()" />
						<i class="fas fa-eye-slash" id="toggleRegisterPassword" style="cursor: pointer;"></i>
					</div>
					<input type="submit" class="submit" value="Sign up" id="registerButton" />
					<button class="btn btn-sty" id="sign-in-btn">
						Already have an account? Sign In
					</button>
				</form>
			</div>
		</div>
	</div>

	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<script>
		// Toggle password visibility for login form
const toggleLoginPassword = document.querySelector('#toggleLoginPassword');
const loginPassword = document.querySelector('#loginPassword');

toggleLoginPassword.addEventListener('click', function() {
    const type = loginPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    loginPassword.setAttribute('type', type);

    // Toggle between eye and eye-slash icons
    if (type === 'password') {
        this.classList.remove('fa-eye');
        this.classList.add('fa-eye-slash');
    } else {
        this.classList.remove('fa-eye-slash');
        this.classList.add('fa-eye');
    }
});

// Toggle password visibility for register form
const toggleRegisterPassword = document.querySelector('#toggleRegisterPassword');
const registerPassword = document.querySelector('#registerPassword');

toggleRegisterPassword.addEventListener('click', function() {
    const type = registerPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    registerPassword.setAttribute('type', type);

    // Toggle between eye and eye-slash icons
    if (type === 'password') {
        this.classList.remove('fa-eye');
        this.classList.add('fa-eye-slash');
    } else {
        this.classList.remove('fa-eye-slash');
        this.classList.add('fa-eye');
    }
});

	</script>

	<script>
		const sign_in_btn = document.querySelector("#sign-in-btn");
		const sign_up_btn = document.querySelector("#sign-up-btn");
		const container = document.querySelector(".container");

		sign_up_btn.addEventListener("click", () => {
			container.classList.add("sign-up-mode");
		});

		sign_in_btn.addEventListener("click", () => {
			container.classList.remove("sign-up-mode");
		});
	</script>
	<script>
		function hideAlertBox() {
			const alertBox = document.getElementById('alertbox');
			alertBox.style.display = 'none';
		}
	</script>

</body>

</html>