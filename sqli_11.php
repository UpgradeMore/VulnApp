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

                <h1 style="margin-left: 25px;"><b>Portal</b></h1>
                    <div class="card shadow mb-4" style="margin-left: 25px; margin-right: 300px;margin-top: 20px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Which bug do you want to hack today? :)</h6>
                        </div>
                        <div class="card-body">

                            <p> <a href="<?php echo ($_SERVER["SCRIPT_NAME"]); ?>?message=test"></a></p>


                            <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="POST">

                                <select name="bug" size="9" id="select_portal">

                                   <?php

    // Lists the options from the array 'bugs' (bugs.txt)
                                     foreach ($bugs as $key => $value)
    {

                                      $bug = explode(",", trim($value));

       // Debugging
       // echo "key: " . $key;
       // echo " value: " . $bug[0];
       // echo " filename: " . $bug[1] . "<br />";
                                         $selected = (mb_stristr($bug[1], basename($_SERVER["SCRIPT_NAME"]))!==false)? ' selected="selected"':'';


                                         echo "
                                         <option title='$bug[1]' value='$key' $selected>$bug[0]</option>";

    }

                                         ?>

                                        </select>

                                        <br />

                                          <button type="submit" name="form" value="submit">Hack</button>

                                          </form> 
                                          <div id="side">

                                              <a href="http://twitter.com" target="blank_" class="button"><img src="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjuoeHErsj1AhXO3jgGHZlbBJsQ9zB6BAgYEAk&url=https%3A%2F%2Ftwitter.com%2FTwitter&usg=AOvVaw1XWTdiJqtc0marIDXgeFxa"></a>
                                              <a href="http://be.linkedin.com" target="blank_" class="button"><img src="./images/linkedin.png"></a>
                                              <a href="http://www.facebook.com" target="blank_" class="button"><img src="./images/facebook.png"></a>
                                              <a href="http://itsecgames.blogspot.com" target="blank_" class="button"><img src="./images/blogger.png"></a>

                        </div>                

                            

                        </div>


                        <br />
                    </div>
                </div>
                <div class="mb-6">
                    <div class="card card-sm card-body rounded mb-3" style="margin-left: 25px; margin-right: 25px;">
                        <div data-target="#panel-1" class="accordion-panel-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1"><span class="h6 mb-0">Solution</span><span class="icon" style="margin-left: 10px;"><i class="fas fa-angle-down"></i></span></div>
                        <div class="collapse" id="panel-1">
                            <div class="pt-3">
                                <p class="mb-0">' or 'a' ='a</p>
                            </div>
                        </div>
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