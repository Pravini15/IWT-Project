<?php
include("configlogin.php");
extract($_POST);
$sql = "INSERT INTO `contactdata`(`name`, `phone`, `email`, `message`) VALUES ('".$name."',".$phone.",'".$email."','".$message."')";
$result = $mysqli->query($sql);
if(!$result){
    die("Couldn't enter data: ".$mysqli->error);
}
echo '<script>window.location.href = "FormSuccess.php";</script>';
$mysqli->close();
?>