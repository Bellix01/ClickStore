<?php
include "config/db.php";
session_start();


$id = $_SESSION["uid"];
$sql = "SELECT * FROM user_info where `user_id`=$id";
$result = mysqli_query($con, $sql);
$row=mysqli_fetch_array($result);

// if (isset($_POST['modify_button'])) {
if (($_SERVER['REQUEST_METHOD']=='POST')){

	$nv_email = $_POST['nv_email'];
	$password = $_POST['password'];
	$nv_password = $_POST['nv_password'];
	$nv_mobile = $_POST['nv_mobile'];
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^0[5-6-7][0-9]{8}+$/";

if(empty($nv_email) || empty($password) || empty($nv_password) ||
	empty($nv_mobile) ){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>rempli tous les champs..!</b>
			</div>
		";
		// header("location:modify_user.php");
		exit();
	} else {

	if(!preg_match($emailValidation,$nv_email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Cette $nv_email n'est pas valide..!</b>
			</div>
		";
		// header("location:modify_user.php");
		exit();
		// echo "<script>alert('Cette $nv_email nest pas valide..!');</svript>";
	}
	
	if(strlen($password) < 9 || md5($password)!=$row['password'] ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mot de passe est incorrect..!</b>
			</div>
		";
		// header("location:modify_user.php");
		exit();
	}
	else{
		if(strlen($nv_password) < 9 ){
			echo "
				<div class='alert alert-warning'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Le nouveau mot de passe est faible</b>
				</div>
				
			";
			// header("location:modify_user.php");
			exit();
		}
	}
	
	if(!preg_match($number,$nv_mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Numéro de portable $nv_mobile n'est pas valide</b>
			</div>
		";
		// header("location:modify_user.php");
		exit();
	}else{
			if($nv_mobile==$row['mobile'] ){
				echo "
					<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Ce numero deja existe</b>
					</div>
					
				";
				// header("location:modify_user.php");
				exit();
			}

		}
	if(!(strlen($nv_mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Le numéro de portable doit être composé de 10 chiffres</b>
			</div>
		";
		// header("location:modify_user.php");
		exit();
	}

	//existing email address in our database
	$sql = "SELECT user_id FROM user_info WHERE email = '$nv_email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>L'adresse e-mail est déjà disponible Essayez une autre adresse e-mail</b>
			</div>
		";
		// header("location:modify_user.php");
		exit();
	} else {
		$nv_password = md5($nv_password);
		$sql=" UPDATE user_info 
		SET email='$nv_email',
		password='$nv_password',
		mobile='$nv_mobile' 
		WHERE user_id=$id";
		// $_SESSION["uid"] = mysqli_insert_id($con);
		// $_SESSION["email"] = $nv_email;
		// $_SESSION["phone"] = $nv_mobile;
		// $ip_add = getenv("REMOTE_ADDR");
		// $sql = "UPDATE cart SET user_id = '$_SESSION[uid' WHERE ip_add='$ip_add' AND user_id = -1";
		if(mysqli_query($con,$sql)){
			// echo "register_success";
			echo "
			<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>client a été modifié avec succès</b>
			</div>
		";
		// header("location:user_page.php");
			exit();
		}else{
					echo "<script>alert('noo');</svript>";

		}
		
	}
	}
	
// }
}



?>






















































