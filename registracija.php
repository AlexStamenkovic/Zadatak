<?php
session_start();
?>
<?php

    if(isset($_POST['btnReg'])){
        require "connection.php";
        if (mysqli_connect_errno()) {
            echo 'Neuspela konekcija sa bazom! Pokusajte ponovo malo kasnije1.';
        } else {

            $ime = mysqli_real_escape_string($db, $_POST['ime2']);
            $email = mysqli_real_escape_string($db, $_POST['email2']);
            $greske=array();
            
            /*funkcije za proveru unetih podataka*/
            function validateIme($a){
                require "connection.php";
                $sql="SELECT * FROM korisnici WHERE ime='$a'";
                $query=mysqli_query($db, $sql);
                $result=mysqli_fetch_all($query, MYSQLI_ASSOC);
                return count($result)==0;
            }
            function validateEmail($a){
                require "connection.php";
                $sql="SELECT * FROM korisnici WHERE email='$a'";
                $query=mysqli_query($db, $sql);
                $result=mysqli_fetch_all($query, MYSQLI_ASSOC);
                return count($result)==0;
            }
            
            if (validateIme($ime)==false){
                $greska="Vec imamo korisnika sa istim korisnickim imenom! Unesite novo korisnicko ime!".'<br>';
                array_push($greske,$greska);
            }
            if (validateEmail($email)==false){
                $greska="Vec imamo korisnika sa istom email adresom! Unesite drugu email adresu!".'<br>';
                array_push($greske,$greska);
            }
            
            if(validateIme($ime) && validateEmail($email)) {
                $query = "INSERT INTO korisnici VALUES (NULL, '$ime', '$email')";
                $result = mysqli_query($db, $query);

                if ($result == false) {
                    echo 'Neuspela konekcija sa bazom! Pokusajte ponovo malo kasnije2.';
                } else {
                    echo '<script>';
                    echo 'alert("Uspesno ste se registrovali!");';
                    echo 'window.location= "prijava_registracija.php";';
                    echo '</script>';
                }
            }
            else { 
                $_SESSION['greske']=$greske; 
                header('Location:greska.php');
            } 
            mysqli_close($db);
            }
    }           
      else {
        header("location:prijava_registracija.php");
    }          
?>
