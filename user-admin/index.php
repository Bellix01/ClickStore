<?php
// require "config/constants.php";
include "config/db.php";

session_start();


include_once "header.php";
include_once "navbar.php";
?>
<div class="swiper mySwiper">
	<div class="swiper-wrapper">
		<div class="swiper-slide"> <img src="./assests/images/pc.png" alt="" srcset=""></div>
		<div class="swiper-slide"> <img src="./assests/images/slider6.jpg" alt="" srcset=""></div>
		<div class="swiper-slide"> <img src="./assests/images/imageonline-co-add-text.png" alt="" srcset=""></div>
		
	</div>
	<div class="swiper-button-next"></div>
	<div class="swiper-button-prev"></div>
	<div class="swiper-pagination"></div>
</div>

<div class="container-fluid">
	<div class="row">


		<?php
		$start = 0;
		$limit = 20;
		$product_query = "SELECT * FROM products LIMIT $start,$limit";
		$run_query = mysqli_query($con, $product_query);
		if (mysqli_num_rows($run_query) > 0) {
			while ($row = mysqli_fetch_array($run_query)) {
				$pro_id    = $row['product_id'];
				$pro_cat   = $row['product_cat'];
				$pro_brand = $row['product_brand'];
				$pro_title = $row['product_title'];
				$pro_price = $row['product_price'];
				$pro_image = $row['product_image'];
				echo "
					<div class='col-lg-3 col-md-6 mb-4 mb-lg-0 text-center'>
					<!-- Card-->
					<div class='card rounded shadow-sm shadow p-3 mb-5 bg-white rounded'>
						<div class='card-body p-4'><img src='product_images/$pro_image' alt=' 'class=' w-75 d-block mx-auto mb-3'style='width:220px; height:250px;'>
							<h5> $pro_title</h5>
							<p class='small text-muted font-italic'>
							 $pro_price MAD
							</p>
		                    <a id='dat' class=' border-info btn btn btn-outline-secondary rounded p-3' href='product_detail.php?pid=$pro_id '><b>Plus de détails</b></a>
							<hr>
							<button pid='$pro_id'  id='product' class='btn btn-primary btn-xs w-100 p-2'>Ajouter au panier</button>
							
						</div>
					</div>
				</div>
		
		
		
		
			";
			}
		}


		?>
	</div>
</div>


<?php
include_once "./footer.php"
?>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper(".mySwiper", {
		spaceBetween: 30,
		centeredSlides: true,
		autoplay: {
			delay: 2500,
			disableOnInteraction: false,
		},
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});
</script>
</script>
</body>

</html>