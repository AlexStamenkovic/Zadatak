<?php

if(isset($_POST['izmeni'])){
    $id=$_POST['id2'];
    $ime=$_POST['ime2'];
    $email=$_POST['email2'];

    function validateEmail($a){
        require "connection.php";
        $sql="SELECT * FROM korisnici WHERE email='$a'";
        $query=mysqli_query($db, $sql);
        $result=mysqli_fetch_all($query, MYSQLI_ASSOC);
        return count($result)==0;
    }
    function validateBroj($a){
        require "connection.php";
        $sql="SELECT * FROM korisnici WHERE id='$a'";
        $query=mysqli_query($db, $sql);
        $result=mysqli_fetch_all($query, MYSQLI_ASSOC);
        return count($result)!=0;
    }

    require "connection.php";

    if(validateEmail($email) && validateBroj($id)){
        $query="UPDATE korisnici SET ime='$ime', email='$email' WHERE id=$id";
        $result = mysqli_query($db, $query);    
        header("Location:admin.php");
    }else{
        header("Location:greska2.php");
    }
    
    mysqli_close($db);       
      
}



?>