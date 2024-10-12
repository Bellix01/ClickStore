<?php
if (isset($_GET["register"])) {



?>

	<?php include_once "header.php";
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
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading text-center">Formulaire d'inscription client</div>
					<div class="panel-body">

						<form id="signup_form" onsubmit="return false" enctype="multipart/form-data" autocomplete="off">
							<div class="row">
								<div class="col-md-6">
									<label for="f_name">Prénom</label>
									<input type="text" id="f_name" name="f_name" class="form-control" placeholder="prenom" required/>
								</div>
								<div class="col-md-6">
									<label for="f_name">Nom de famille</label>
									<input type="text" id="l_name" name="l_name" class="form-control" placeholder="nom" required/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="email">E-mail</label>
									<input type="text" id="email" name="email" class="form-control" placeholder="abc@gmail.com" required/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="password">Mot de passe</label>
									<input type="password" id="password" name="password" class="form-control" required/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="repassword">Confirmez le mot de passe</label>
									<input type="password" id="repassword" name="repassword" class="form-control" required/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="mobile">Numéro de contact</label>
									<input type="text" id="mobile" name="mobile" class="form-control" placeholder="0600000000 (10 chiffres)" required/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="address1">Addresse 1</label>
									<input type="text" id="address1" name="address1" class="form-control" placeholder="street1" required/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="address2">Addresse 2</label>
									<input type="text" id="address2" name="address2" class="form-control" placeholder="street2" required/>
								</div>
							</div>
							<!-- <div class="row">
								<div class="col-md-12">
									<label for="avatar">Choisissez votre avatar</label>
									<input type="file" id="avatar" name="avatar" class="form-control"  required/>
								</div>
							</div> -->
							<p><br /></p>
							<div class="row">
								<div class="col-md-12">
									<input style="width:100%;" value="Sign Up" type="submit" name="signup_button" class="btn btn-primary btn-lg"/>
								</div>
							</div>

					</div>
					</form>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

	<?php
	include_once "./footer.php"
	?>
	</body>

	</html>
<?php
}



?>