<?php

if(isset($_POST['dodaj'])){
$sifra=$_POST['sifra2'];
$naziv=$_POST['naziv2'];
$opis=$_POST['opis2'];
$cena=$_POST['cena2'];
$velicina=$_POST['velicina2'];
$kategorija=$_POST['kategorija2'];
$slika = $_FILES['slika']['name'];
$target = basename($slika); 

function validateBroj($a){
    require "connection.php";
    $sql="SELECT * FROM cipele WHERE sifra='$a'";
    $query=mysqli_query($db, $sql);
    $result=mysqli_fetch_all($query, MYSQLI_ASSOC);
    return count($result)==0;
}
function validateNaziv($a){
    require "connection.php";
    $sql="SELECT * FROM cipele WHERE naziv='$a'";
    $query=mysqli_query($db, $sql);
    $result=mysqli_fetch_all($query, MYSQLI_ASSOC);
    return count($result)==0;
}

require "connection.php";
if(validateBroj($sifra) && validateNaziv($naziv) && (move_uploaded_file($_FILES['slika']['tmp_name'], $target))) { 
    $query="INSERT INTO `cipele` VALUES('$sifra', '$naziv','$opis','$cena','$velicina','$kategorija','$slika')";
    $result = mysqli_query($db, $query);
    header("Location: artikli.php");
    }else{
    header("Location: greska2.php");
    }
  
mysqli_close($db);
}

?>