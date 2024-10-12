<?php

require "config/db.php";
session_start();

if (isset($_GET['pid'])) {
    $prod_id=$_GET['pid'];
    $sql="SELECT * FROM products WHERE product_id=$prod_id";
    $stmt=mysqli_query($con,$sql);
    $product=mysqli_fetch_assoc($stmt);
    $p= $product['product_image'];
    // $p_id = $product['product_id'];

    $sql1="SELECT c.cat_title,b.brand_title FROM products p,categories c,brands b WHERE p.product_cat=c.cat_id and b.brand_id=p.product_brand and product_id=$prod_id";
    $stmt1=mysqli_query($con,$sql1);
    $catg=mysqli_fetch_assoc($stmt1);
   
    // $product = $query_fetch_array($stmt);
    if (!$product) {
        exit('Product does not existe1');
    }
} else {
    exit('Product does not existe1');
}
$pdo = NULL;
include_once "header.php";
include_once "navbar.php";
?>

<!-- here start page code -->
<head>
<link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/owl.carousel.min.css">
    <link rel="stylesheet" href="css1/owl.theme.default.min.css">
    <link rel="stylesheet" href="css1/core.css">
    <link rel="stylesheet" href="css1/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <link rel="stylesheet" href="css1/custom.css">
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
  
</head>
    <style>
       .small-img-group{
           display: flex;
           justify-content: space-between;
       }
       .small-img-col{
           flex-basis: 24%;
           cursor: pointer;
       }
       .sproduct input{
           width: 70px;
           height: 25px;
           padding-left: 10px;
           font-size: 15px;
           margin-right: 10px;
           
       }
       .sproduct input:focus{
           outline: none;
       }
       .buy-btn{
           background: #fb77fb;
           opacity: 1;
           transition: 0.3s all;
       }

    </style>
    <?php
if(isset($_POST['review_submit'])){
	$rating=$_POST['rating'];
	$review=$_POST['review'];
    $id=$_SESSION['uid'];
	$added_on=date('Y-m-d h:i:s');
    $sql="INSERT INTO product_review(product_id,user_id,rating,review,status,added_on) VALUES('$prod_id','$id','$rating','$review','1','$added_on')";
	mysqli_query($con,$sql);
	// header('location:product_detail.php?pid='.$prod_id);
    // echo "<script>alert('hii')</script>";
    // echo "$rating--> $review--> $prod_id--> $id";
	// die();
}

$sql1="SELECT user_info.first_name,product_review.id,product_review.rating,product_review.review,product_review.added_on FROM user_info,product_review WHERE product_review.status=1 AND product_review.user_id=user_info.user_id AND product_review.product_id='$prod_id' ORDER BY product_review.added_on DESC";

$product_review_res=mysqli_query($con,$sql1);

?>
<section class="container sproduct my-1 pt-0">

    <div class="row mt-0">
    <div class="col-md-12 col-xs-12" id="product_msg">
				</div>
        <div class="col-lg-4 col-md-12 col-12 card">
        <img src="/home/user-admin/product_images/<?=$product['product_image']?>" id="MainImg" class="img-fluid w-100 pb-1 "  alt="<?=$product['product_title']?>">
         
        <div class="small-img-group">
            <div class="small-img-col">
            <img <?="src=/home/user-admin/product_images/$p";?> width="100%" class="small-img" alt="<?=$product['product_title'];?>">
            </div>
            <div class="small-img-col">
            <img src="/home/user-admin/product_images/<?=$product['product_image']?>" width="100%" class="small-img" alt="<?=$product['product_title']?>">
            </div>
            <div class="small-img-col">
            <img src="/home/user-admin/product_images/<?=$product['product_image']?>" width="100%" class="small-img" alt="<?=$product['product_title']?>">
            </div>
            <div class="small-img-col">
            <img src="/home/user-admin/product_images/<?=$product['product_image']?>" width="100%" class="small-img" alt="<?=$product['product_title']?>">
            </div>
        </div>
        </div>
        <div class="col-lg-5 col-md-12 col-12">
             <h2><?=$product['product_title']?></h2></br></br>
            <h4>Prix:</h4><?=$product['product_price']?> MAD</br><br>
            <h4>Catégorie/Marque:</h4><?=$catg['cat_title']?>/<?=$catg['brand_title']?><br></br>
            <input type="number" name="product_qty" value="1" min="1" max="<?=$product['product_qty']?>" >
            <?php 
            echo "<button pid='$prod_id' id='product' class='btn btn-primary btn-lg'>Ajouter au panier</button>" ;
            ?>
            </br></br>
            <h4 class="mt-2 mb-2">mots clés</h4>
        <span>#<?=$product['product_keywords']?>#</span>
        </div>
       
    </div>
</section>

<!-- Start Product Description -->
<section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab text-center px-2 " role="tablist">
                            <li role="presentation" class="description  btn btn-outline-info btn-lg"><a class="text-dark" href="#description" role="tab" data-toggle="tab">déscription de produit</a></li>
							<li role="presentation" class="review  btn btn-outline-info btn-lg"><a class="text-dark" href="#review" role="tab" data-toggle="tab" class="active show" aria-selected="true">Commentaires</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner pt-5">
                                    <?=$product['product_desc']?>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
							<div role="tabpanel" id="review" class="pro__single__content tab-pane fade active show">
                                <div class="pro__tab__content__inner">
                                    <?php 
									if(mysqli_num_rows($product_review_res)>0){
									
									while($product_review_row=mysqli_fetch_assoc($product_review_res)){
									?>
									
									<article class="row">
										<div class="col-md-12 col-sm-12">
										  <div class="panel panel-default arrow left">
											<div class="panel-body">
											  <header class="text-left">
												<div><span class="comment-rating"> <?php echo $product_review_row['rating']?></span> (<?php echo $product_review_row['first_name']?>)</div>
												<time class="comment-date"> 
<?php
$added_on=strtotime($product_review_row['added_on']);
echo date('d M Y',$added_on);
?>
												
												
												
												</time>
											  </header>
											  <div class="comment-post">
												<p>
												  <?php echo $product_review_row['review']?>
												</p>
											  </div>
											</div>
										  </div>
										</div>
									</article>
									<?php } }else { 
										echo "<h3 class='submit_review_hint'>Aucun avis ajouté</h3><br/>";
									}
									?>
									
									
                                    <h3 class="review_heading">Entrez votre avis</h3><br/>
									<?php
									if(isset($_SESSION['uid'])){
									?>
									<div class="row" id="post-review-box" style=>
									   <div class="col-md-12">
										  <form action="" method="post">
											 <select class="form-control" name="rating" required>
												  <option value="">Sélectionnez la notation</option>
												  <option>le plus mauvais </option>
												  <option>mauvais </option>
												  <option>Bien </option>
												  <option>Très bien </option>
												  <option>Fantastique </option>
											 </select>	<br/>
											 <textarea class="form-control" cols="50" id="new-review" name="review" placeholder="Donnez votre avis ici..." rows="5"></textarea>
											 <div class="text-right mt10"><br>
												<button class="btn btn-success btn-lg" type="submit" name="review_submit">Soumettre</button>
											 </div>
										  </form>
									   </div>
									</div>
									<?php } else {
										echo "<span class='submit_review_hint'>S'il vous plaît <a href='login_form.php'>connecter</a>pour déposer votre avis</span>";
									}
									?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->

<!-- //////////////////////////////////////////////////////////////////////////////////// -->





<!-- here ends page code -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
 integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<script>
var MainImg=document.getElementById('MainImg');
var smallimg=document.getElementsByClassName('small-img');

smallimg[0].onclick=function(){
    MainImg.src=smallimg[0].src;
}
smallimg[1].onclick=function(){
    MainImg.src=smallimg[1].src;
}
smallimg[2].onclick=function(){
    MainImg.src=smallimg[2].src;
}
smallimg[3].onclick=function(){
    MainImg.src=smallimg[3].src;
}
</script>


<?php
include_once "./footer.php"
?>
