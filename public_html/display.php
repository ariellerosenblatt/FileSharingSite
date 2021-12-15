<?php
    require("config.php");
    $path = USERS . $_SESSION["user"];
    $file = $_GET['file'];

    //Displaying files 
    if (isset($_GET["file"])) { 
        // https://stackoverflow.com/questions/21686375/list-all-subdirectories-and-files-from-outside-the-document-root 
        $type = mime_content_type($path . '/' . $file);
        $contents = file_get_contents($path . '/' . $file);

        header('Content-Type: ' . $type);
        header('Content-Disposition: attatchment;filename=' . $file);
        header('Content-Disposition: inline;filename=' . $file);

      
        print $contents;
    }

    ?>

   
