<?php

session_start();


include("config.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
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
    <script src="js/json2.js"></script>
</head>


<body onload="process()">
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

                <h1 style="margin-left: 25px;"><b>XSS - Reflected (AJAX/JSON)</b></h1>
                    <div class="card shadow mb-4" style="margin-left: 25px; margin-right: 300px;margin-top: 20px;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Search Movie details</h6>
                        </div>
                        <div class="card-body">
                        <p>

<label for="title">Search for a movie:</label>
<input type="text" id="title" name="title">

</p>
<div id="result"></div>
<script>

// Stores the reference to the XMLHttpRequest object
var xmlHttp = createXmlHttpRequestObject();

// Retrieves the XMLHttpRequest object
function createXmlHttpRequestObject()
{
    // Stores the reference to the XMLHttpRequest object
    var xmlHttp;
    // If running Internet Explorer 6 or older
    if(window.ActiveXObject)
    {
        try
        {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e)
        {
            xmlHttp = false;
        }
    }
    // If running Mozilla or other browsers
    else
    {
        try
        {
            xmlHttp = new XMLHttpRequest();
        }
        catch (e)
        {
            xmlHttp = false;
        }
    }
    // Returns the created object or displays an error message
    if(!xmlHttp)
        alert("Error creating the XMLHttpRequest object.");
    else
        return xmlHttp;
}

// Makes an asynchronous HTTP request using the XMLHttpRequest object
function process()
{
    // Proceeds only if the xmlHttp object isn't busy
    if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0)
    {
        // Retrieves the movie title typed by the user on the form
        // title = document.getElementById("title").value;
        title = encodeURIComponent(document.getElementById("title").value);
        // Executes the 'xss_ajax_1-2.php' page from the server
        xmlHttp.open("GET", "xss_ajax_2-2.php?title=" + title, true);
        // Defines the method to handle server responses
        xmlHttp.onreadystatechange = handleServerResponse;
        // Makes the server request
        xmlHttp.send(null);
    }
    else
        // If the connection is busy, try again after one second
        setTimeout("process()", 1000);
}

// Callback function executed when a message is received from the server
function handleServerResponse()
{
    // Move forward only if the transaction has completed
    if(xmlHttp.readyState == 4)
    {
        // Status of 200 indicates the transaction completed successfully
        if(xmlHttp.status == 200)
        {
            // Extracts the JSON retrieved from the server
<?php

        if($_COOKIE["security_level"] == "2")
        {

?>
            JSONResponse = JSON.parse(xmlHttp.responseText);
<?php

        }

        else
        {
?>
            JSONResponse = eval("(" + xmlHttp.responseText + ")");
<?php

            }

?>
            // Generates HTML output
            // var result = "";
            // Obtains the value of the JSON response
            result = JSONResponse.movies[0].response;
            // Iterates through the arrays and create an HTML structure
            //for (var i=0; i<JSONResponse.movies.length; i++)
            //    result += JSONResponse.movies[i].response + "<br/>";
            // Obtains a reference to the <div> element on the page
            // Displays the data received from the server
            document.getElementById("result").innerHTML = result;
            // Restart sequence
            setTimeout("process()", 1000);
        }
        // A HTTP status different than 200 signals an error
        else
        {
            alert("There was a problem accessing the server: " + xmlHttp.statusText);
        }
    }
}

</script>

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