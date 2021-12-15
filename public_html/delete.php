
<?php
    require("config.php");
    $filedelete = $_POST['file'];
    $delete = USERS . $_SESSION["user"] . "/" . $filedelete;

    //seeing if it deletes and actually doing the delete
    if ($_POST['Delete'] == 'Delete') {
        if (!unlink($delete)) {
            exit;
            header("Location: dashboard.php?status=filedeletefail");
        } else {
            header("Location: dashboard.php?status=successfullydeleted");
        }
    }
?>