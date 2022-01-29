<?php

session_start();


include("config.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}

$bugs = file("bugs.txt");

if(isset($_POST["form_bug"]) && isset($_POST["bug"]))
{

            $key = $_POST["bug"];
            $bug = explode(",", trim($bugs[$key]));

            // Debugging
            // print_r($bug);

            header("Location: " . $bug[1]);

            exit;

}

if(isset($_POST["form_security_level"]) && isset($_POST["security_level"]))
{

    $security_level_cookie = $_POST["security_level"];


    if($evil_bee == 1)
    {

        setcookie("security_level", "666", time()+60*60*24*365, "/", "", false, false);

    }

    else
    {

        setcookie("security_level", $security_level_cookie, time()+60*60*24*365, "/", "", false, false);

    }

    header("Location: directory_traversal_2.php?directory=documents");

    exit;

}
if(isset($_COOKIE["security_level"]))
{


}
else
{

    $security_level = "not set";

}

$directory = "";
$directory_traversal_error = "";
function show_directory($directory)
{

    // Checks whether a file or directory exists
    if(file_exists($directory))
    {

        $dp = opendir($directory);

        while($line = readdir($dp))
        {

            if($line != "." && $line != ".." && $line != ".htaccess")
            {

                echo "<a href=\"" . $directory . "/" . $line . "\" target=\"_blank\">" . $line . "</a><br />";

            }

        }

    }

    else
    {

        echo "This directory doesn't exist!";

    }

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

                <h1 style="margin-left: 25px;"><b>Directory Traversal - Directories</b></h1>
                    <div class="card shadow mb-4" style="margin-left: 25px; margin-right: 300px;margin-top: 20px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Directories</h6>
                        </div>
                        <div class="card-body">

                        <?php

if(isset($_GET["directory"]))
{

    $directory = $_GET["directory"];

    switch($_COOKIE["security_level"])
        {

        case "0" :

            show_directory($directory);

            // echo "<br />" . $_GET['page'];

            break;

        case "1" :

            $directory_traversal_error = directory_traversal_check_2($directory);

            if(!$directory_traversal_error)
            {

                show_directory($directory);

            }

            else
            {

                echo $directory_traversal_error;

            }

            break;

        case "2" :

            $directory_traversal_error = directory_traversal_check_3($directory, $base_path = "./documents");

            if(!$directory_traversal_error)
            {

                show_directory($directory);

            }

            else
            {

                echo $directory_traversal_error;

            }

            break;

        default :

            show_directory($directory);

            break;

    }

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