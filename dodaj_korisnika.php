<?php

if(isset($_POST['dodaj'])){
    $ime=$_POST['ime'];
    $email=$_POST['email'];

    function validateEmail($a){
        require "connection.php";
        $sql="SELECT * FROM korisnici WHERE email='$a'";
        $query=mysqli_query($db, $sql);
        $result=mysqli_fetch_all($query, MYSQLI_ASSOC);
        return count($result)==0;
    }

    require "connection.php";

    if(validateEmail($email)){
        $query="INSERT INTO `korisnici` VALUES(NULL, '$ime', '$email')";
        $result = mysqli_query($db, $query);    
        header("Location:admin.php");
    }else{
        header("Location:greska2.php");
    }
    
    mysqli_close($db);       
      
}

?>