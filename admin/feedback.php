<?php
include_once('../phpScripts/login_header.php');
?>
<!DOCTYPE html>

<html lang="en">
<html>

<head>
    <?php include("templates/head.html");?>
    <script type="text/javascript" src="/admin/js/admin_message.js"></script>   
</head>

<body>
    <?php include("templates/header.html");?>

    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h3>Admin</h3>
            <h4>
                <a href="/index.php">Home</a>
                <label>/</label><a href="/admin/index.php">Admin</a>
                <label>/</label>Feedback</h4>
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="main_content">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Message</th>
                </tr>
            </thead>
        </table>
    </div>

    <!--footer-->
    <?php include("templates/footer.html");?>
    <!-- //footer-->
</body>

</html>