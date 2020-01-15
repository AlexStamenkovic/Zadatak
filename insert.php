<?php  
 $connect = mysqli_connect("localhost", "root", "", "prodavnica");  
 $sql = "INSERT INTO cipele(naziv, opis) VALUES('".$_POST["naziv"]."', '".$_POST["opis"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Dodat artikal';  
 }  
 ?> 