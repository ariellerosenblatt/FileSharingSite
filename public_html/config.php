<?php
    //want to include this file in everything 
    session_start();
    define("USERS", "/home/agr/Module2/Users/"); //USERS = that path 
    
    if ($_GET["status"] == "filedeletefail") { 
        $status = "Failed to delete! "; //sending out status
    } else if ($_GET["status"] == "successfullydeleted") {
        $status = "Success in deleting file! "; //sending out status
    }
