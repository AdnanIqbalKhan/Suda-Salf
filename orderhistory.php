<?php
include_once('phpScripts/login_header.php');
?>
<!DOCTYPE html>

<html lang="en">
<html>

<head>
    <?php include("templates/head.html");?>
</head>

<body>
    <?php include("templates/header.html");?>

    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h3>Order History</h3>
            <h4>
            <a href="/index.php">Home</a>
            <label>/</label><a href="/index.php">Home</a>
            <label>/</label>Order History</h4>
            <div class="clearfix"> </div>
        </div>
    </div>
   
    <div class="main_content">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Amount</th>
                    <th>Time</th>
                    <th>ShopKeeper email</th>
                    <th>Customer email</th>
                </tr>
            </thead>
        </table>
    </div>

    <!--footer-->
    <?php include("templates/footer.html");?>
    <!-- //footer-->
</body>

</html>