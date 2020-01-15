<?php

if(isset($_POST['izmeni'])){
    $naziv=$_POST['naziv3'];
    $broj=$_POST['broj'];

    function validateNaziv($a){
        require "connection.php";
        $sql="SELECT * FROM kategorije WHERE naziv='$a'";
        $query=mysqli_query($db, $sql);
        $result=mysqli_fetch_all($query, MYSQLI_ASSOC);
        return count($result)==0;
    }

    function validateBroj($a){
        require "connection.php";
        $sql="SELECT * FROM kategorije WHERE broj='$a'";
        $query=mysqli_query($db, $sql);
        $result=mysqli_fetch_all($query, MYSQLI_ASSOC);
        return count($result)!=0;
    }

    require "connection.php";

    if(validateNaziv($naziv) && validateBroj($broj)){
        $query="UPDATE `kategorije` SET naziv='$naziv' WHERE broj=$broj";
        $result = mysqli_query($db, $query);    
        header("Location:kategorije.php");
    }else{
        header("Location:greska2.php");
    }
    
    mysqli_close($db);       
      
}



?>