<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
     body{
            background-color:#AAADFF;
        }
</style>
<body>

<?php
require "header.php";
$ime = $_SESSION['ime'];

if($_SESSION == NULL){
    header('Location: prijava_registracija.php');
}else{
    echo '<br><br><br><br><p style="font-size:40px;text-align:center"> DOBRODOSLI '.$ime.'</p>';
}
?>

</body>

</html>