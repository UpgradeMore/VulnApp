<?php

include("functions_external.php");
$language = "";
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

                <h1 style="margin-left: 25px;"><b>Remote & Local File Inclusion (RFI/LFI)</b></h1>
                    <div class="card shadow mb-4" style="margin-left: 25px; margin-right: 300px;margin-top: 20px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">

                            <p> <a href="<?php echo ($_SERVER["SCRIPT_NAME"]); ?>?message=test"></a></p>


                            <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="GET">

                            Select a language:

                            <select name="language">

                            <?php

                            if($_COOKIE["security_level"] == "1" || $_COOKIE["security_level"] == "2")
                            {

                            ?>
                                        <option value="lang_en">English</option>
                                        <option value="lang_fr">Fran??ais</option>
                                        <option value="lang_nl">Nederlands</option>

                            <?php

                            }

                            else
                            {

                            ?>
                                        <option value="lang_en.php">English</option>
                                        <option value="lang_fr.php">Fran??ais</option>
                                        <option value="lang_nl.php">Nederlands</option>

                            <?php

                            }

                            ?>
                                    </select>

                                    <button type="submit" name="action" value="go">Go</button>

                                </form>

                                <br />
                            <?php

                            if(isset($_GET["language"]))
                            {

                                if($_COOKIE["security_level"] == "2")
                                {

                                    if(in_array($language, $available_languages)) include($language);

                                }

                                else
                                {

                                    include($language);

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