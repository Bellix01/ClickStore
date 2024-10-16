<?php
#this is Login form page , if user is already logged in then we will not allow user to access this page by executing isset($_SESSION["uid"])
#if below statment return true then we will send user to their profile.php page
if (isset($_SESSION["uid"])) {
	header("location:profile.php");
}
//in action.php page if user click on "ready to checkout" button that time we will pass data in a form from action.php page
if (isset($_POST["login_user_with_product"])) {
	//this is product list array
	$product_list = $_POST["product_id"];
	//here we are converting array into json format because array cannot be store in cookie
	$json_e = json_encode($product_list);
	//here we are creating cookie and name of cookie is product_list
	setcookie("product_list", $json_e, strtotime("+1 day"), "/", "", "", TRUE);
}

include_once "header.php";
include_once "navbar.php";
?>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" id="signup_msg">
			<!--Alert from signup form-->
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">connexion client</div>
				<div class="panel-body">
					<!--User Login Form-->
					<form onsubmit="return false" id="login">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" name="email" id="email" required />
						<label for="email">Mot de passe</label>
						<input type="password" class="form-control" name="password" id="password" required />
						<p><br /></p>
						<!-- <a href="#" style="color:#333; list-style:none;">Forgotten Password</a> -->
						<input type="submit" class="btn btn-success btn-lg" style="float:center;" Value="Login">
						<!--If user dont have an account then he/she will click on create account button-->
						<div><a href="customer_registration.php?register=1">Créer un nouveau compte</a></div>
						<!-- <div><a href="forgot_password.php">Mot de passe oublié?</a></div> -->
					</form>
				</div>
				<div class="panel-footer">
					<div id="e_msg"></div>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
	<?php
	include_once "./footer.php"
	?>
	</body>


	</html>