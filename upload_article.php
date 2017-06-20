// this is for a PHP cased FTP action. The file uploaded by the user here will be
// saved in the same directory where this file resides.


<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
  <input type="text" name="title">
  <input type="file" name="<?php echo $_GET['author'];?>">
  <input type="textarea" name="synopsis">
  <input type="submit" value="upload article" name="submit">
</form>

<?php

//Chek if the
$author = $_GET['author'];
$targetDirectory = "uploads/";
$targetFile = $targetDirectory . $author . date(Y.m.d);
$uploadOK = 1;
$fileType = pathinfo($targetFile,PATHINFO_EXTENSION);

if (isset($_POST['submit'])) {
  if ($fileType == 'doc'){
    $check = TRUE;
  } else {
    echo "Please upload in .doc format";
    $uploadOK = 0;
  }
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES[$author]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES[$author]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
