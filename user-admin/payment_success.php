<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}

// if (isset($_GET['payer_id'])) {

		$id=$_SESSION['uid'];

		include_once("config/db.php");
		$sql = "SELECT p_id,qty FROM cart WHERE user_id = '$id'";
		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
			function GeraHash($qtd){
//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
$Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
$QuantidadeCaracteres = strlen($Caracteres);
$QuantidadeCaracteres--;

$Hash=NULL;
    for($x=1;$x<=$qtd;$x++){
        $Posicao = rand(0,$QuantidadeCaracteres);
        $Hash .= substr($Caracteres,$Posicao,1);
    }

return $Hash;
}

//Here you specify how many characters the returning string must have
$trx_id=GeraHash(17);
$date = date("Y-m-d h:i:s");
			# code...
			while ($row=mysqli_fetch_array($query)) {
			$product_id[] = $row["p_id"];
			$qty[] = $row["qty"];
			}

			for ($i=0; $i < count($product_id); $i++) { 
				$sql = "INSERT INTO orders (user_id,product_id,qty,trx_id,p_status,date_cmd) VALUES ('$id','".$product_id[$i]."','".$qty[$i]."','$trx_id','Completed','".$date."')";
				mysqli_query($con,$sql);
			}

			$sql = "DELETE FROM cart WHERE user_id = '$id'";
			if (mysqli_query($con,$sql)) {
				?>
					<!DOCTYPE html>
					<html>
						<head>
							<meta charset="UTF-8">
							<title>ClickStore</title>
							<link rel="stylesheet" href="css/bootstrap.min.css"/>
							<script src="js/jquery2.js"></script>
							<script src="js/bootstrap.min.js"></script>
							<script src="main.js"></script>
							<style>
								table tr td {padding:10px;}
							</style>
						</head>
					<body>
						<?php
include_once "header.php";
include_once "navbar.php";
						?>
						<div class="container-fluid">
						
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Merci pour l'achat!! </h1>
											<hr/>
											<p>Bonjour <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Votre processus de paiement est
terminé avec succès et votre identifiant de transaction est <b><?php echo $trx_id; ?></b><br/>
vous pouvez continuer votre shopping <br/></p>
											<a href="index.php" class="btn btn-success btn-lg">Continuer vos achats</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>

				<?php
			}
		}else{
			header("location:index.php");
		}
		
	// }




?>

















































