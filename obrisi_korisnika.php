<?php

if(isset($_POST['obrisi'])){
    $id=$_POST['id'];

    function validateBroj($a){
        require "connection.php";
        $sql="SELECT * FROM korisnici WHERE id='$a'";
        $query=mysqli_query($db, $sql);
        $result=mysqli_fetch_all($query, MYSQLI_ASSOC);
        return count($result)!=0;
    }
    require "connection.php";

    if(validateBroj($id)){
        $query="DELETE FROM korisnici WHERE id='$id'";
        $result = mysqli_query($db, $query);    
        header("Location:admin.php");
    }else{
        header("Location:greska2.php");
    }
    
}
mysqli_close($db);

?>