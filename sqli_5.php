<?php

session_start();


include("config.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}
function sqli($data)
{
    return $data;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VulnApp - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/main.min.css" rel="stylesheet">

</head>


<body>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include('siderbar.php');
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" style="background-color: #000;">

                <?php
                include('header.php');
                ?>


                <div id="main">

                <h1 style="margin-left: 25px;"><b>SQL Injection Blind (WS/SOAP)</b></h1>
                    <div class="card shadow mb-4" style="margin-left: 25px; margin-right: 300px;margin-top: 20px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Select a movie:</h6>
                        </div>
                        <div class="card-body">

                            <p> <a href="<?php echo ($_SERVER["SCRIPT_NAME"]); ?>?message=test"></a></p>


                            <form action="<?php echo($_SERVER["SCRIPT_NAME"]); ?>" method="GET">

<p>Select a movie:

<select name="title">

<?php

    // Selects all the records
    $sql = "SELECT * FROM movies";

    $recordset = mysqli_query($link, $sql);

    // Fills the 'select' object
    while($row = mysqli_fetch_array($recordset))
    {

?>
    <option value="<?php echo $row["title"];?>"><?php echo $row["title"];?></option>
<?php

    }

    mysqli_close($link);

?>

</select>

<button type="submit" name="action" value="go">Go</button>

</p>

</form>

<?php

if(isset($_REQUEST["title"]))
{

// Includes the NuSOAP library
require_once("soap/nusoap.php");

// Creates an instance of the soap_client class
$client = new nusoap_client("http://localhost/bWAPP/ws_soap.php");

// Calls the SOAP function
$tickets_stock = $client->call("get_tickets_stock", array("title" => sqli($_REQUEST["title"])));

echo "We have <b>" . $tickets_stock . "</b> movie tickets available in our stock.";

}

?>
                        </div>


                        <br />
                    </div>
                </div>

            </div>




            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/main.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>