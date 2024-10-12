<?php
require "config/db.php";

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
    <?php
    while ($rows = mysqli_fetch_array($result)) {
    ?>
        <div id="signup">
            <div id="signup-st">
                <form action="" method="POST" id="signin" id="reg">
                    <div id="reg-head" class="headrg">Mon Profile</div>
                    <table border="0" align="center" cellpadding="2" cellspacing="0">
                        <tr id="lg-1">
                            <td class="tl-1">
                                <div align="left" id="tb-name">Id de Client: </div>
                            </td>
                            <td class="tl-4"><?php echo $rows['user_id']; ?></td>
                        </tr>
                        <tr id="lg-1">
                            <td class="tl-1">
                                <div align="left" id="tb-name">Nom complet:</div>
                            </td>
                            <td class="tl-4"><?php echo $rows['first_name'] . ' ' . $rows['last_name']; ?></td>
                        </tr>
                        <tr id="lg-1">
                            <td class="tl-1">
                                <div align="left" id="tb-name">E-mail :</div>
                            </td>
                            <td class="tl-4"><?php echo $rows['email']; ?></td>
                        </tr>
                        <tr id="lg-1">
                            <td class="tl-1">
                                <div align="left" id="tb-name">Numero de téléphone :</div>
                            </td>
                            <td class="tl-4"><?php echo $rows['mobile']; ?></td>
                        </tr>
                        <tr id="lg-1">
                            <td class="tl-1">
                                <div align="left" id="tb-name">Adresse :</div>
                            </td>
                            <td class="tl-4"><?php echo $rows['address1']; ?></td>
                        </tr>
                    </table>
                    <!-- <div id="reg-bottom" class="btmrg">Copyright &copy; 2015 7topics.com</div> -->
                </form>
            </div>

        </div>
        <div id="login">
            <div id="login-sg">
            <div id="st"><a href="customer_order.php" id="st-btn1">Mes commandes</a></div>
            <div id="st"><a href="modify_user.php" id="st-btn2">Modifier le compte</a></div>
                <div id="st"><a href="logout.php" id="st-btn3">Se déconnecter</a></div>        
            </div>
        </div>
    <?php
        // close while loop 
    }
    ?>
    </div>
    </div>
    </div>
    </br>
    <?php
    include_once "./footer.php"
    ?>