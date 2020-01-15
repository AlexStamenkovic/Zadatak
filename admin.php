<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dataTables.bootstrap.min.css"/>
    <script type="text/javascript" src="datatables.min.js"></script>
    <script type="text/javascript" src="jquery.dataTables.min.js"></script>
</head>
<style>
     body{
            background-color:#AAADFF;
        }
</style>
<body>

<?php
require "header.php";
$ime = $_SESSION['ime'];

if($_SESSION == NULL){
    header('Location: prijava_registracija.php');
}else{
    echo '<br><br><br><br><p style="font-size:40px;text-align:center"> DOBRODOSLI '.$ime.'</p><br><br>';
}
?>
<h2 style="text-align:center">Trenutno registrovani korisnici</h2>
<br><br>

<div class="container">
    <div class="table-responsive">
    <table id="tabela" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Redni broj</th>
                <th>Ime</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        <?php
            require "connection.php";
            $query="SELECT * from `korisnici`";
            $result=mysqli_query($db,$query);
            while($data=mysqli_fetch_array($result)){
                echo '
                    <tr>
                        <td>'.$data['id'].'</td>
                        <td>'.$data['ime'].'</td>
                        <td>'.$data['email'].'</td>
                    </tr>
                ';
            }
            mysqli_close($db);
        ?>
        </tbody>
    </table>
    </div>
    </div>

    <div style="text-align:center;margin-bottom:20px">
    <input type="button" class="btn btn-primary" value="Obrisi korisnika" id="obrisi">
    <input type="button" class="btn btn-success" value="Dodaj korisnika" id="dodaj">
    <input type="button" class="btn btn-danger" value="Izmeni korisnika" id="izmeni">
    </div>

    <form class="container" action="obrisi_korisnika.php" method="POST" style="display:none;width:50%;border:2px solid red;margin:auto" id="upitnik1">
        <h3 >Zelite da obrisete korisnika?</h3>
        <input type="text" class="form-control" name="id" placeholder="Unesi id korisnika" required><br>        
        <input type="submit" class="btn btn-success" value="Sacuvaj" name="obrisi">
    </form>

    <form class="container" action="dodaj_korisnika.php" method="POST" style="display:none;width:50%;border:2px solid red;margin:auto" id="upitnik2">
        <h3 >Zelite da dodate korisnika?</h3>
        <input type="text" class="form-control" name="ime" placeholder="Unesi ime korisnika" required><br>
        <input type="email" class="form-control" name="email" placeholder="Unesi email korisnika" required><br>        
        <input type="submit" class="btn btn-success" value="Sacuvaj" name="dodaj">
    </form>

    <form class="container" action="izmeni_korisnika.php" method="POST" style="display:none;width:50%;border:2px solid red;margin:auto" id="upitnik3">
        <h3 >Zelite da izmenite korisnika?</h3>
        <input type="text" class="form-control" name="id2" placeholder="Unesi broj korisnika" required><br>
        <input type="text" class="form-control" name="ime2" placeholder="Unesi novo ime" required><br>
        <input type="email" class="form-control" name="email2" placeholder="Unesi novu email adresu" required><br>        
        <input type="submit" class="btn btn-success" value="Sacuvaj" name="izmeni">
    </form>

    <script>
        $(document).ready(function(){
           $(".table").DataTable();

            
        $("#obrisi").on("click", function(){    
            $("#upitnik1").css('display','block');
            $("#upitnik2").css('display','none');
            $("#upitnik3").css('display','none');
            });

            $("#dodaj").on("click", function(){    
                $("#upitnik2").css('display','block');
                $("#upitnik1").css('display','none');
                $("#upitnik3").css('display','none');
            });

            $("#izmeni").on("click", function(){    
                $("#upitnik3").css('display','block');
                $("#upitnik2").css('display','none');
                $("#upitnik1").css('display','none');
            });
        }); 
</script>

</body>

</html>