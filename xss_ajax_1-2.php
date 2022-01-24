<?php


function xss($data)
{
         
  
    return $data;

}

if(isset($_GET["title"]))
{

    // Creates the movie table
    $movies = array("CAPTAIN AMERICA", "IRON MAN", "SPIDER-MAN", "THE INCREDIBLE HULK", "THE WOLVERINE", "THOR", "X-MEN");

    // Retrieves the movie title
    $title = $_GET["title"];

    // Generates the XML output
    header("Content-Type: text/xml; charset=utf-8");

    // Generates the XML header
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>";

    // Creates the <response> element
    echo "<response>";

    // Generates the output depending on the movie title received from the client
    if(in_array(strtoupper($title), $movies))
        echo "Yes! We have that movie...";
    else if(trim($title) == "")
        echo "HINT: our master really loves Marvel movies :)";
    else
        echo xss($title) . "??? Sorry, we don't have that movie :(";

    // Closes the <response> element
    echo "</response>";

}

else 
{
    
    echo "<font color=\"red\">Try harder :p</font>";
    
}

?>