<?php

$message = "(requires the PHP SQLite module)";
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

                <h1 style="margin-left: 25px;"><b>SQL Injection - Stored (SQLite)</b></h1>
                    
                <div class="card shadow mb-4" style="margin-left: 25px; margin-right: 300px;margin-top: 20px;">
                <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="POST">

<p><label for="entry">Add an entry to our blog:</label><br />
<textarea name="entry" id="entry" cols="80" rows="3"></textarea></p>

<button type="submit" name="entry_add" value="add">Add Entry</button>
<button type="submit" name="entry_delete" value="delete">Delete Entries</button>

<?php

if(isset($_POST["entry_add"]))
{

    $entry = sqli($_POST["entry"]);
    $owner = $_SESSION["login"];

    if($entry == "")
    {

        $message =  "<font color=\"red\">Please enter some text...</font>";

    }

    else
    {

        $db = new PDO("sqlite:".$db_sqlite);

        $sql = "SELECT max(id) as id FROM blog;";

        $recordset = $db->query($sql);

$row = $recordset->fetch();

$id = $row["id"];

        $sql = "INSERT INTO blog (id, date, entry, owner) VALUES (" . ++$id . ",'" . date('Y-m-d', time()) . "','" . $entry . "','" . $owner . "');";

$db->exec($sql);

        $message = "<font color=\"green\">The entry was added to our blog!</font>";

    }

}

elseif(isset($_POST["entry_delete"]))
{

$db = new PDO("sqlite:".$db_sqlite);

        $sql = "DELETE FROM blog;";

        $db->exec($sql);

$message = "<font color=\"green\">Your entries were deleted!</font>";

}

echo "&nbsp;&nbsp;" . $message;

?>

</form>

                            
                            

                               <table id="table_yellow">

                               <tr height="30" bgcolor="#9936f3" align="center">

                                <td width="20">#</td>
                                 <td width="100"><b>Owner</b></td>
                                 <td width="100"><b>Date</b></td>
                                  <td width="445"><b>Entry</b></td>

                                 </tr>

                                <?php

                                if (isset($_GET["title"])) {

                                    $title = $_GET["title"];

                                    $sql = "SELECT * FROM movies WHERE title LIKE '%" . sqli($title) . "%'";

                                    $recordset = mysqli_query($link, $sql);

                                    if (!$recordset) {

                                        // die("Error: " . mysqli_error());

                                ?>

                                        <tr height="50">

                                            <td colspan="5" width="580"><?php die("Error: " . mysqli_error($link)); ?></td>
                                            <!--
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        -->

                                        </tr>
                                        <?php

                                    }

                                    if (mysqli_num_rows($recordset) != 0) {

                                        while ($row = mysqli_fetch_array($recordset)) {

                                            // print_r($row);

                                        ?>

                                            <tr height="30">

                                                <td><?php echo $row["title"]; ?></td>
                                                <td align="center"><?php echo $row["release_year"]; ?></td>
                                                <td><?php echo $row["main_character"]; ?></td>
                                                <td align="center"><?php echo $row["genre"]; ?></td>
                                                <td align="center"><a href="http://www.imdb.com/title/<?php echo $row["imdb"]; ?>" target="_blank">Link</a></td>

                                            </tr>
                                        <?php

                                        }
                                    } else {

                                        ?>

                                        <tr height="30">

                                            <td colspan="5" width="580">No movies were found!</td>
                                            <!--
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        -->

                                        </tr>
                                    <?php

                                    }

                                    mysqli_close($link);
                                } else {

                                    ?>

                                    <tr height="30">

                                        <td colspan="5" width="580"></td>
                                        <!--
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        -->

                                    </tr>
                                <?php

                                }

                                ?>

                            </table>

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