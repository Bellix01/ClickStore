<?php

require "config/constants.php";
session_start();
include_once "header.php";
include_once "navbar.php";


?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" id="cart_msg">
			<!--Cart Message-->
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Paiement du panier</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-2 col-xs-2"><b>Action</b></div>
						<div class="col-md-2 col-xs-2"><b>Image de produit</b></div>
						<div class="col-md-2 col-xs-2"><b>Nom de Produit</b></div>
						<div class="col-md-2 col-xs-2"><b>Quantité</b></div>
						<div class="col-md-2 col-xs-2"><b>Prix de Produit</b></div>
						<div class="col-md-2 col-xs-2"><b>Prix en <?php echo ' MAD'; ?></b></div>
					</div>
	
					<div id="cart_checkout"></div>
				
				</div>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
	<div class="col-md-2"></div>

</div>
<?php
include_once "./footer.php"
?>

<script>
	var CURRENCY = '<?php echo CURRENCY; ?>';
</script>
</body>

</html>