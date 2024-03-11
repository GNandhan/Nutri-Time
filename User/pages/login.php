<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/login.css" />
    <link rel="icon" href="../images/icon.png">
	<title>Sign in & Sign up Form</title>
</head>
<body>
	<div class="container">
		<div class="forms-container">
			<div class="signin-signup">
				<form action="#" class="sign-in-form">
					<h2 class="title">Sign in</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" placeholder="Username" />
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" placeholder="Password" />
					</div>
					<a href="../../index.html" class="btn solid" style="text-align: center;padding-top: 10px; text-decoration: none;">Submit</a>
					<!-- <input type="submit" value="Login" class="btn solid" /> -->
					<!-- <p class="social-text">Or Sign in with social platforms</p> -->
					<!-- <div class="social-media">
						<a href="#" class="social-icon">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fab fa-twitter"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fab fa-google"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fab fa-linkedin-in"></i>
						</a>
					</div> -->
				</form>
				<form action="#" class="sign-up-form">
					<h2 class="title">Sign up</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" placeholder="Name" />
					</div>
					<div class="input-field">
						<i class="fas fa-phone"></i>
						<input type="text" placeholder="Phone No" />
					</div>
					<div class="input-field">
						<i class="fas fa-venus-mars"></i>
						<input type="text" placeholder="Gender" />
					</div>
					<div class="input-field">
						<i class="fas fa-envelope"></i>
						<input type="email" placeholder="Email" />
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" placeholder="Password" />
					</div>
					<!-- <input type="submit" class="btn" value="Sign up" /> -->
					<button class="btn" id="sign-in-btn">Sign up</a>
				</form>
			</div>
		</div>

		<div class="panels-container">
			<div class="panel left-panel">
				<div class="content">
					<h3>New here ?</h3>
					<p>
						Register Now for Stay healthier and stronger
					</p>
					<button class="btn transparent" id="sign-up-btn">
						Sign up
					</button>
				</div>
				<img  src="https://i.ibb.co/6HXL6q1/Privacy-policy-rafiki.png" class="image" alt="" />
			</div>
			<div class="panel right-panel">
				<div class="content">
					<h3>One of us ?</h3>
					<p>
						Already have an account.?
                        
					</p>
					<button class="btn transparent" id="sign-in-btn">
						Sign in
					</button>
				</div>
				<img src="https://i.ibb.co/nP8H853/Mobile-login-rafiki.png"  class="image" alt="" />
			</div>
		</div>
	</div>

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
</body>

</html>