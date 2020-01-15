<?php

if(isset($_POST['izmeni'])){
$sifra=$_POST['sifra3'];
$naziv=$_POST['naziv3'];
$opis=$_POST['opis3'];
$cena=$_POST['cena3'];
$velicina=$_POST['velicina3'];
$kategorija=$_POST['kategorija3'];

function validateBroj($a){
    require "connection.php";
    $sql="SELECT * FROM cipele WHERE sifra='$a'";
    $query=mysqli_query($db, $sql);
    $result=mysqli_fetch_all($query, MYSQLI_ASSOC);
    return count($result)!=0;
}
function validateNaziv($a){
    require "connection.php";
    $sql="SELECT * FROM cipele WHERE naziv='$a'";
    $query=mysqli_query($db, $sql);
    $result=mysqli_fetch_all($query, MYSQLI_ASSOC);
    return count($result)==0;
}

require "connection.php";
if(validateBroj($sifra) && validateNaziv($naziv)){
    $query="UPDATE cipele SET naziv='$naziv', opis='$opis', cena='$cena', velicina='$velicina',
    kategorija='$kategorija' WHERE sifra=$sifra";
    $result = mysqli_query($db, $query);
    header("Location: artikli.php");
    }else{
    header("Location: greska2.php");  
    }

mysqli_close($db);
}

?>