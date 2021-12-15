<?php
    session_start();
    $username = $_SESSION["user"];
    
    $filename = basename($_FILES['uploadedfile']['name']);
    $type = mime_content_type($_FILES['uploadedfile']['name']);
    $explode = explode(".", $filename);
    $end = strtolower(trim(end($explode)));

    if (!preg_match('/^[\w_\.\-]+$/', $filename)) {
        echo "Invalid filename";
        exit;
    }
    
    if (!preg_match('/^[\w_\-]+$/', $username)) {
        echo "Invalid username";
        exit;
    }
    
    if ($end == "png" || $end == "jpeg" || $end == "jpg") {
        $files = scandir("profpics/".$_SESSION["user"]);
        foreach ($files as $file) {
            unlink("profpics/".$_SESSION["user"]."/".$file);
        }

        $full_path = ("profpics/".$_SESSION["user"]."/".$filename);
        if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path)) {
            header("Location: dashboard.php?status=SUCCESS");
            exit;
        } else {
            header("Location: dashboard.php?status=FAIL");
            exit;
        }
    } else {
        header("Location: dashboard.php?status=invalidphotofile");
    }
