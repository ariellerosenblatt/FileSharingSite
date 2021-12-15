<?php
    //session_start();
    require("config.php");
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Sharing Site</title>
</head>
<body>

<?php
    echo("Welcome ");
    echo($_SESSION["user"]); //printing username 
    echo("!!!");
    ?>
       <br> </br>
       <?php
    $user = "user";
    $files = scandir("profpics/".$_SESSION["user"]); //scanning for files 
    $prof;
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                $prof = "profpics/".$_SESSION["user"]."/".$file; //accessing profpics folders
            }
        }
   if (isset($prof)) {
       echo('<img src="'.$prof.'"style="height: 100px; width: auto" alt= "Cannot display image" align: right-centered>');
       ?>
       <br> </br>
       <?php
   }

    $dir = opendir(USERS . $user); //open directory

    echo "<ul>";

    while ($file = readdir($dir)) {
        if ($file == '.' || $file == '..') {
            continue;
        } ?>

    <li> <a href = "display.php" target = "_blank"> <img src="<?=$file?>" /></a> </li>
    <?php
    }
    echo("</ul>");
    closedir($dir);
?>
    You have successfully logged in! 
    <?php
    if (isset($status)) {
        echo $status; //printing out the status
    }
    ?>
    <form method = "get" action = "Module2Group.php">
    <input type = "submit" value = "Log Out" name = "Log Out"> 
    </form>

    <form enctype="multipart/form-data" method="POST" action="upload.php">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
		<input type="submit" value="Upload File" />
	</p>
</form>
<form action = "delete.php" method = "POST">
        <br>
        <table> 
            <?php
                $files = scandir("/home/agr/Module2/Users/".$_SESSION["user"]);
                foreach ($files as $file) {
                    $finfo = new finfo(FILEINFO_MIME_TYPE);
                    $mime = $finfo->file("/home/agr/Module2/Users/".$_SESSION["user"] ."/" . $file);
                    if ($mime != "directory") {
                        echo("<tr> <td> ");
                        echo('<input type="radio" value="'. $file .'" name="file" > '); ?>
                        <a href = "display.php?file=<?=$file?>" target = "_blank"> <?=$file?> </a> </td> <td> 
                        <?php
                        if (strstr($file, ".pdf")) { //going through and finding icons 
                            ?>
                            <img src="https://image.flaticon.com/icons/png/512/80/80942.png" style="height: 50px; width: auto" alt= "Cannot display image">
                            <?php
                        }
                        if (strstr($file, ".png")) {
                            ?>
                            <img src="https://icons.iconarchive.com/icons/icons8/windows-8/512/Files-Png-icon.png" style="height: 50px; width: auto" alt= "Cannot display image">
                            <?php
                        }
                        if (strstr($file, ".img")) {
                            ?>
                            <img src="https://cdn1.iconfinder.com/data/icons/file-format-set/64/2272-512.png" style="height: 50px; width: auto" alt= "Cannot display image">
                            <?php
                        }
                        if (strstr($file, ".jpeg")) {
                            ?>
                            <img src="https://static.thenounproject.com/png/3283231-200.png" style="height: 50px; width: auto" alt= "Cannot display image">
                            <?php
                        }
                        if (strstr($file, ".jpg")) {
                            ?>
                            <img src="https://image.flaticon.com/icons/png/512/29/29264.png" style="height: 50px; width: auto" alt= "Cannot display image">
                            <?php
                        }
                        if (strstr($file, ".doc")) {
                            ?>
                            <img src="https://icon-library.com/images/doc-icon-png/doc-icon-png-28.jpg" style="height: 50px; width: auto" alt= "Cannot display image">
                            <?php
                        }
                        if (strstr($file, ".txt")) {
                            ?>
                            <img src="https://img.icons8.com/ios/452/txt.png" style="height: 50px; width: auto" alt= "Cannot display image">
                            <?php
                        }
                        if (strstr($file, ".xlsx")) {
                            ?>
                            <img src="https://image.flaticon.com/icons/png/512/28/28813.png" style="height: 50px; width: auto" alt= "Cannot display image">
                            <?php
                        }

                        echo("</td> </tr>");
                    }
                }
        

            ?>
            </table> 
            <input type = "Submit" value = "Delete" name = "Delete">
            
        
        <br>
</form>

<form enctype="multipart/form-data" method="POST" action="profpic.php">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<label for="uploadfile_input">Choose a photo to be your profile picture!</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
		<input type="submit" value="Upload File" />
        <br>
        </br>
	</p>
    
</form>

</body>
</html>