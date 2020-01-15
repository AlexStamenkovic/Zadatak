<?php

if(isset($_POST['dodaj'])){
    $naziv=$_POST['naziv2'];

    function validateNaziv($a){
        require "connection.php";
        $sql="SELECT * FROM kategorije WHERE naziv='$a'";
        $query=mysqli_query($db, $sql);
        $result=mysqli_fetch_all($query, MYSQLI_ASSOC);
        return count($result)==0;
    }
    require "connection.php";
    if(validateNaziv($naziv)) {
        $query="INSERT INTO `kategorije` VALUES(NULL, '$naziv')";
        $result = mysqli_query($db, $query);
        header("Location:kategorije.php");
    }else{
        header("Location:greska2.php");
    }

mysqli_close($db);
}

?>