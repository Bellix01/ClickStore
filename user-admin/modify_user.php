<?php 
include "config/db.php";

session_start();

include_once "header.php";
include_once "navbar.php";

$id = $_SESSION["uid"];
$sql = "SELECT * FROM user_info where `user_id`=$id";
$result = mysqli_query($con, $sql);


   ?>

<!DOCTYPE html>
<html>

<head>
    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type' />
    <link rel="stylesheet" href="css/user.css">
</head>

<body>
    
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
                <div class="panel-heading text-center">Modifier votre informations</div>
                <div class="panel-body">
      <?php
while( $row=mysqli_fetch_array($result)){
      ?>
                    <form id="modify_form" method="POST" action="confirme_modification.php">
             

                            <p class="text-center"><?php
                                 echo "<label style='color:black;'>Nom de Client: </label>".' '.$row['first_name'].' '.$row['last_name'] ;
                                 ?></span></p>
                            <?php
                        }
?>   
                    <div class="row">
                            <div class="col-md-12">
                                <label for="nv_email">Nouveau E-mail</label>
                                <input type="text" id="nv_email" name="nv_email" class="form-control"  required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="password">Ancien mot de passe</label>
                                <input type="password" id="password" name="password" class="form-control"  required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nv_password">Nouveau Mot de passe</label>
                                <input type="password" id="nv_password" name="nv_password" class="form-control" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nv_mobile">Nouveau numero de telephone</label>
                                <input type="text" id="nv_mobile" name="nv_mobile" class="form-control"  required>
                            </div>
                        </div>
                        <p><br /></p>
                        <div class="row">
                            <div class="col-md-12">
                                <input style="width:50%; margin-left:250px;" value="modifier" type="submit" name="modify_button" class="btn btn-success btn-lg">
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

