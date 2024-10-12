<?php
session_start();
include "config/db.php";

function valide($d)
{
	$d=trim($d);
	$d=htmlspecialchars($d);
	$d=stripslashes($d);
	return $d;
}
if (isset($_POST["f_name"]))
 {
	$f_name =valide($_POST["f_name"]);
	$l_name =valide( $_POST["l_name"]);
	$email =valide( $_POST['email']);
	$password =valide( $_POST['password']);
	$repassword =valide( $_POST['repassword']);
	$mobile =valide( $_POST['mobile']);
	$address1 =valide( $_POST['address1']);
	$address2 =valide( $_POST['address2']);
	// if(isset($_FILES['avatar'])){
	// $avatar_path=mysqli_real_escape_string($con,'user_avatar_images/'.$_FILES['avatar']['name']);
	// // $avatar=$_POST["avatar"];
	// }
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^0[5-6-7][0-9]{8}+$/";
	
	// $v_avatar="/^[_a-zA-Z0-9-]*\.(jpg|png|jpeg)$/";

if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
	empty($mobile) || empty($address1) || empty($address2) ){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>rempli tous les champs..!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($name,$f_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Ce $f_name n'est pas valide..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($name,$l_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Ce $l_name n'est pas valide..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Cette $email n'est pas valide..!</b>
			</div>
		";
		exit();
	}
	if(strlen($password) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Le mot de passe est faible</b>
			</div>
		";
		exit();
	}
	if(strlen($repassword) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Le mot de passe est faible</b>
			</div>
		";
		exit();
	}
	if($password != $repassword){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>le mot de passe n'est pas le même</b>
			</div>
		";
		exit();
	}
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Numéro de portable $mobile n'est pas valide</b>
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Le numéro de portable doit être composé de 10 chiffres</b>
			</div>
		";
		exit();
	}
	// if(!preg_match("!image!",$_FILES['avatar']['type'])){
	// 	echo "
	// 		<div class='alert alert-warning'>
	// 			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	// 			<b>l'extension n'est pas valide..!</b>
	// 		</div>
	// 	";
	// 	exit();
	// }
	//existing email address in our database
	$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>L'adresse e-mail est déjà disponible Essayez une autre adresse e-mail</b>
			</div>
		";
		exit();
	} else {
		$password = md5($password);
		$sql = "INSERT INTO `user_info` 
		(`user_id`, `first_name`, `last_name`, `email`, 
		`password`, `mobile`, `address1`, `address2`) 
		VALUES (NULL, '$f_name', '$l_name', '$email', 
		'$password', '$mobile', '$address1', '$address2')";
		$run_query = mysqli_query($con,$sql);
		$_SESSION["uid"] = mysqli_insert_id($con);
		$_SESSION["name"] = $f_name;
		$_SESSION["prenom"]=$l_name;
		$_SESSION["email"] = $email;
		$_SESSION["adresse"]=$address1;
		$_SESSION["phone"] = $mobile;

		$ip_add = getenv("REMOTE_ADDR");
		$sql = "UPDATE cart SET user_id = '$_SESSION[uid]' 
		WHERE ip_add='$ip_add' AND user_id = -1";
		if(mysqli_query($con,$sql)){
			// echo "register_success";
			echo "
			<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>client créé avec succès</b>
			</div>
		";
			exit();
		}
	}
	}
	
}



?>






















































