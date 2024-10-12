<?php
//require "config/constants.php";

session_start();
if (!isset($_SESSION["uid"])) {
	header("location:index.php");
}
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
					<h1>Détails de la commande client</h1>
					<hr />
					<?php
					include_once("config/db.php");
					$user_id = $_SESSION["uid"];
					$orders_list = "SELECT o.order_id,o.user_id,o.product_id,o.qty,o.trx_id,o.p_status,o.date_cmd,p.product_title,p.product_price,p.product_image FROM orders o,products p WHERE o.user_id='$user_id' AND o.product_id=p.product_id";
					$query = mysqli_query($con, $orders_list);
					if (mysqli_num_rows($query) > 0) {
						while ($row = mysqli_fetch_array($query)) {
					?>
							<div class="row">
								<div class="col-md-6">
									<img style="float:right; width:60%; height:90%;" src="product_images/<?php echo $row['product_image']; ?>" class="img-responsive img-thumbnail" />
								</div>
								<div class="col-md-6">
									<table>
										<tr>
											<td>Nom de produit: </td>
											<td><b><?php echo $row["product_title"]; ?></b> </td>
										</tr>
										<tr>
											<td>Prix de produit: </td>
											<td><b><?php echo   " " . $row["product_price"]." MAD"; ?></b></td>
										</tr>
										<tr>
											<td>Quantité: </td>
											<td><b><?php echo $row["qty"]; ?></b></td>
										</tr>
										<tr>
											<td>Identifiant de transaction: </td>
											<td><b><?php echo $row["trx_id"]; ?></b></td>
										</tr>
										<tr>
											<td>La date de commande: </td>
											<td><b><?php echo $row["date_cmd"]; ?></b></td>
										</tr>
									</table>
									
								</div>
							</div>
					<?php
						}
					}
					?>

				</div>
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