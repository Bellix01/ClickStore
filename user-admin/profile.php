<?php
require "config/constants.php";
session_start();

include_once "header.php";
include_once "navbar.php";
?>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div id="get_category">
			</div>

			<div id="get_brand">
			</div>

		</div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12 col-xs-12" id="product_msg">
				</div>
			</div>
			<div class="panel panel-info" id="scroll">
				<div class="panel-heading">Produits</div>
				<div class="panel-body">
					<div id="get_product">
						<!--Here we get product jquery Ajax Request-->
					</div>
					<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsung Galaxy</div>
								<div class="panel-body">
									<img src="product_images/images.JPG"/>
								</div>
								<div class="panel-heading">$.500.00
									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>
							</div>
						</div> -->
				</div>
				<div class="panel-footer">&copy; <?php echo date("Y"); ?></div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
	<!-- <div class="row">
		<div class="col-md-12">
			<center>
				<ul class="pagination" id="pageno">
					<li><a href="#">1</a></li>
				</ul>
			</center>
		</div>
	</div> -->
</div>
<?php
include_once "./footer.php"
?>

</body>

</html>