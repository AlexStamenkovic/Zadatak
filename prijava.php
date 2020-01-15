<?php
session_start();

if(isset($_POST['btnLog'])){
    require "connection.php";
    $ime = $_POST['ime'];
    $email = $_POST['email'];

    $sql = "SELECT * FROM korisnici WHERE ime = '$ime' AND email='$email'";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($query);
    if($result!=NULL){
        $_SESSION['id'] = $result['id'];
        $_SESSION['ime'] = $result['ime'];
        $_SESSION['email'] = $result['email'];
        if($_SESSION['id']==1){
            header("location: admin.php");
        }else{
        header("location: korisnik.php");
        }
    }else{
        echo '<script>';
        echo 'alert("Ne postoji korisnik sa navedenim korisnickim imenom i/ili email adresom!");';
        echo 'window.location= "prijava_registracija.php";';
        echo '</script>';
    }
}


?>

