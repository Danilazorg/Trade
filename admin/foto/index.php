<?php
error_reporting (0);
?>
<?php
if (isset( $_POST [ 'upload' ])) {
$filename = $_FILES [ "uploadfile" ][ "name" ];
$tempname = $_FILES [ "uploadfile" ][ "tmp_name" ];
$folder = "../images/" . $filename ;
$db = mysqli_connect( "localhost" , "lizerg" , "starcraft11" , "trade" );
$sql = "INSERT INTO `Products`(`img`) VALUES ('$filename')" ;
mysqli_query( $db , $sql );
move_uploaded_file( $tempname , $folder );
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<link rel= "stylesheet" type= "text/css" href = "style.css" />
<div id= "content" >
<form method= "POST" action= "" enctype= "multipart/form-data" >
<input type= "file" name= "uploadfile" value= "" />
<div>
<button type= "submit" name= "upload" >UPLOAD</button>
</div>
</form>
</div>
</body>
</html>