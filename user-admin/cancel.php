<?php
// require "config/constants.php";
include "config/db.php";

session_start();


include_once "header.php";
include_once "navbar.php";
?>
<div class="container">
    <div class="status">
        <h1 class="error" align="center">Votre transaction PayPal a été annulée</h1>
    </div>
	<div class="text-center ">
    <a href="index.php" class="btn btn-outline-primary ">Back to Products</a>
	</div>
</div>

<style>
	.error{
		color: red;
	}

</style>