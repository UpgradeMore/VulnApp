<?php

session_start();


include("config.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}
$message = "";

if(isset($_POST["action"]))
{

    $email = $_POST["email"];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {

    $message = "<font color=\"red\">Please enter a valid e-mail address!</font>";

    }

    else
    {

        $email = mysqli_real_escape_string($link, $email);

        $sql = "SELECT * FROM users WHERE email = '" . $email . "'";

        // Debugging
        // echo $sql;    

        $recordset = $link->query($sql);

        if(!$recordset)
        {

            die("Error: " . $link->error);

        }

        // Debugging
        // echo "<br />Affected rows: ";
        // printf($link->affected_rows);

        $row = $recordset->fetch_object();

        // If the user is present
        if($row)
        {

            // Debugging
            // echo "<br />Row: ";
            // print_r($row);

            $login = $row->login;

            // Security level LOW
            // Prints the secret
            if($_COOKIE["security_level"] != "1" && $_COOKIE["security_level"] != "2")
            {

                $secret = $row->secret;

                $message = "Hello " . ucwords($login) . "! Your secret: <b>" . $secret . "</b>";

            }

            // Security level MEDIUM
            // Mails the secret
            if($_COOKIE["security_level"] == "1")
            {

                if($smtp_server != "")
                {

                    ini_set( "SMTP", $smtp_server);

                // Debugging
                // $debug = "true";

                }

                $secret = $row->secret;

                // Sends a mail to the user
                $subject = "bWAPP - Your Secret";

                $sender = $smtp_sender;

                $content = "Hello " . ucwords($login) . ",\n\n";
                $content.= "Your secret: " . $secret . "\n\n";
                $content.= "Greets from bWAPP!";

                $status = @mail($email, $subject, $content, "From: $sender");

                if($status != true)
                {

                    $message = "<font color=\"red\">An e-mail could not be sent...</font>";

                    // Debugging
                    // die("Error: mail was NOT send");
                    // echo "Mail was NOT send";

                }

                else
                {

                    $message = "<font color=\"green\">An e-mail with your secret has been sent.</font>";

                 }

            }

            // Security level HIGH
            // Mails a reset code
            if($_COOKIE["security_level"] == "2")
            {

                if($smtp_server != "")
                {

                    ini_set( "SMTP", $smtp_server);

                    // Debugging
                    // $debug = "true";

                }

                // 'Reset code' generation
                $reset_code = random_string();
                $reset_code = hash("sha1", $reset_code, false);

                // Debugging
                // echo $reset_code;

                // Sends a reset mail to the user
                $subject = "bWAPP - Change Your Secret";
                $server = $_SERVER["HTTP_HOST"];
                $sender = $smtp_sender;

                $email_enc = urlencode($email);

                $content = "Hello " . ucwords($login) . ",\n\n";
                $content.= "Click the link to reset and change your secret: http://" . $server . "/bWAPP/secret_change.php?email=" . $email_enc . "&reset_code=" . $reset_code . "\n\n";
                $content.= "Greets from bWAPP!";                 

                $status = @mail($email, $subject, $content, "From: $sender");

                if($status != true)
                {

                    $message = "<font color=\"red\">An e-mail could not be sent...</font>";

                    // Debugging
                    // die("Error: mail was NOT send");
                    // echo "Mail was NOT send";

                }

                else
                {

                    $sql = "UPDATE users SET reset_code = '" . $reset_code . "' WHERE email = '" . $email . "'";

                    // Debugging
                    // echo $sql;

                    $recordset = $link->query($sql);

                    if(!$recordset)
                    {

                        die("Error: " . $link->error);

                    }

                    // Debugging
                    // echo "<br />Affected rows: ";
                    // printf($link->affected_rows);

                    $message = "<font color=\"green\">An e-mail with a reset code has been sent.</font>";

                 }

            }

        }

        else
        {

            if($_COOKIE["security_level"] != "1" && $_COOKIE["security_level"] != "2")
            {

                $message = "<font color=\"red\">Invalid user!</font>";

            }

            else
            {

                $message = "<font color=\"green\">An e-mail with a reset code has been sent. Yeah right :)</font>";

            }

        }

    }

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

                    <h1 style="margin-left: 25px;"><b>Broken Auth. - Forgotten Function</b></h1>
                    <div class="card shadow mb-4" style="margin-left: 25px; margin-right: 300px;margin-top: 20px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Apparently you forgot your secret...</h6>
                        </div>
                        <div class="card-body">


                        <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="POST">

        <p><label for="email">E-mail:</label><br />
        <input type="text" id="email" name="email"></p>

        <button type="submit" name="action" value="forgot">Forgot</button>

    </form>   

                            

                        </div>


                        <br />
                        <?php

    echo $message;

    $link->close();

    ?>
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