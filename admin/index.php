<?php
include_once('../phpScripts/login_header.php');
?>
<?php
include_once('../phpScripts/db_config.php');

$sql = "SELECT * FROM
(SELECT COUNT(*)  as Coustomer FROM sudasalf.user WHERE type=1) a join
(SELECT COUNT(*)  as Admin FROM sudasalf.user WHERE type=2) b join
(SELECT COUNT(*)  as Shopkeeper FROM sudasalf.user WHERE type=3) c;";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_stats = array("Coustomer" => $row["Coustomer"], "Admin" => $row["Admin"], "Shopkeeper" => $row["Shopkeeper"]);

} else {
    $user_stats = array("Coustomer" => 0, "Admin" => 0, "Shopkeeper" => 0);
}
?>
    <!DOCTYPE html>

    <html lang="en">
    <html>

    <head>
        <?php include("templates/head.html");?>

        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            // Load the Visualization API and the corechart package.
            google.charts.load('current', {
                'packages': ['corechart', 'geochart'],
                'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
            });

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart1);
            google.charts.setOnLoadCallback(drawChart2);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart1() {
                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'User');
                data.addColumn('number', 'count');
                data.addRows([
                    ['Customer', <?php echo $user_stats["Coustomer"]; ?>],
                    ['Shopkeeper', <?php echo $user_stats["Shopkeeper"]; ?>],
                    ['Admin', <?php echo $user_stats["Admin"]; ?>]
                ]);

                // Set chart options
                var options = {
                    'title': 'Users Overview',
                    'pieHole': 0.4,
                    'width': '100%',
                    'height': 300,
                    is3D: true
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }

            function drawChart2() {
                $.getJSON("/phpScripts/visit_per_countries.json", function (data) {

                    var row_data = [
                        ['Country', 'Visits']
                    ];

                    $.each(data, function (key, val) {
                        row_data.push([key, val]);
                    });

                    var data = google.visualization.arrayToDataTable(row_data);
                    var options = {
                        colorAxis: {
                            colors: ['#cc3300', '#bfff00', '#008000']
                        },
                        backgroundColor: '#81d4fa',
                        datalessRegionColor: '#adad85',
                        defaultColor: '#f5f5f5',
                        'title': 'Server Traffic',
                        'width': '100%',
                        'height': 300
                    };



                    // Instantiate and draw our chart, passing in some options.
                    var chart = new google.visualization.GeoChart(document.getElementById('chart_div2'));
                    chart.draw(data, options);
                });
            }
        </script>
        <style>
            .charts {

                float: left;
                border: 2px double black;
                margin: 2em;
            }


            .overlay {
                position: absolute;
                bottom: 20px;
                right: 100px;
            }
        </style>
    </head>

    <body>
        <?php include("templates/header.html");?>

        <!--banner-->
        <div class="banner-top">
            <div class="container">
                <h3>Admin</h3>
                <h4>
                    <a href="/admin/index.php">Home</a>
                    <label>/</label>Admin</h4>
                <div class="clearfix"> </div>
            </div>
        </div>

        <div class="kic-top " style="margin-bottom: 3em;">
            <div class="container ">
                <div class="kic ">
                    <h3>Welcome to admin dashboard</h3>

                </div>
                <div class="col-md-4 kic-top1">
                    <a href="/admin/user.php">
                        <img src="/admin/img/users.png" class="img-responsive" alt="">
                    </a>
                    <h6>Users</h6>
                    <p>Information</p>
                </div>
                <div class="col-md-4 kic-top1">
                    <a href="/admin/feedback.php">
                        <img src="/admin/img/feedback.png" class="img-responsive" alt="">
                    </a>
                    <h6>Feedback</h6>
                    <p>Data</p>
                </div>
                <div class="col-md-4 kic-top1" id="download_file" style="cursor: pointer">
                    
                        <img src="/admin/img/log.png" class="img-responsive" alt="">
                    
                    <h6>Server log</h6>
                    <p>Download</p>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top:2em; margin-bottom:2em;">
            <div class="col-md-5 col-sm-5 charts" id="chart_div"></div>
            <div class="col-md-2 col-sm-2"></div>

            <div class="col-md-5 col-sm-5 charts" style="background-color: #81d4fa;">

                <div id="chart_div2"></div>

                <div class="overlay">
                    <b>Server Traffic</b>
                </div>

            </div>

        </div>
        <div class="clearfix"> </div>
        </div>
        <!--footer-->
        <?php include("templates/footer.html");?>
        <!-- //footer-->
    </body>

    </html>