<?php

if(isset($_POST['obrisi'])){
    $sifra=$_POST['sifra'];

    function validateBroj($a){
        require "connection.php";
        $sql="SELECT * FROM cipele WHERE sifra='$a'";
        $query=mysqli_query($db, $sql);
        $result=mysqli_fetch_all($query, MYSQLI_ASSOC);
        return count($result)!=0;
    }

    require "connection.php";

    if(validateBroj($sifra)){
        $query="DELETE FROM `cipele` WHERE sifra='$sifra'";
        $result=mysqli_query($db,$query);    
        header("Location:artikli.php");
    }else{
        header("Location:greska2.php");
    }
}
mysqli_close($db);

?>