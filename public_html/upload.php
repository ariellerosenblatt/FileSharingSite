<?php
    session_start(); 
    $username = $_SESSION["user"]; 
    
    $filename = basename($_FILES['uploadedfile']['name']);
    echo($filename); 

    //Get file name to make sure it is valid
    if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
        echo " Invalid filename";
        exit;
    }

    //Get user name to make sure valid
    if( !preg_match('/^[\w_\-]+$/', $username) ){
        echo "Invalid username";
       exit;
    }

    $full_path = sprintf("/home/agr/Module2/Users/%s/%s", $username, $filename);
    echo($full_path);
    if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
        header("Location: dashboard.php?status=SUCCESS");
        exit;
    }else{
        header("Location: dashboard.php?status=FAIL");
        exit;
    }

?>