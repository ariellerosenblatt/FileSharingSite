<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Sharing Site</title>
</head>
<body>
<?php
    session_start(); //starts session 
    require("config.php");
    //echo($_SESSION["user"]);
    $location = "/home/agr/Module2/users.txt";
    $handle = fopen($location, "r");
    $userinput = $_GET["userinput"];
    $logout = $_GET["logout"];


if (!isset($logout)) { //if logout isnt set 
    if ($handle) {
        echo "<ul>\n";
        while (!feof($handle)) {
            $line = fgets($handle);
            if ((strcmp(trim($line), trim($userinput)) == 0) && (trim($line)!= "")) {
                $_SESSION["user"] =  trim($userinput);
                header("Location: dashboard.php"); //redirecting to dashboard
            }
        }
        echo "</ul>\n";
        fclose($handle); 
    } else {
        echo("Problem with server!"); //printout out error 
    }
} else {
    session_destroy(); //exits the session 
    header("Location: Module2Group.php"); 
}
?>
        <form method="GET" action="Module2Group.php"> <br>
            <label> Input username: <input type="text" name="userinput" /></label>
            <input type="submit" value="Search" />
        </form>


</body>
</html>

