<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
<title>Document</title>
</head>
<style>
     body{
            background-color:#AAADFF;
        }
    .container, form{
        margin-top:50px;
    }
</style>
<body>
<?php
require "header.php";
?>
<h2 style="text-align:center;margin-top:100px">ARTIKLI</h2>
<div class="container">
    <div class="table-responsive">
    <table id="example" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th >Sifra</th>
                <th>Naziv</th>
                <th>Opis</th>
                <th>Cena</th>
                <th>Velicina</th>
                <th>Kategorija</th>
                <th>Slika</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $db = mysqli_connect('localhost', 'root', '', 'prodavnica');
            $query="SELECT * from `cipele`";
            $result=mysqli_query($db,$query);
            while($data=mysqli_fetch_array($result)){
                echo '
                    <tr>
                        <td>'.$data['sifra'].'</td>
                        <td>'.$data['naziv'].'</td>
                        <td>'.$data['opis'].'</td>
                        <td>'.$data['cena'].'</td>
                        <td>'.$data['velicina'].'</td>
                        <td>'.$data['kategorija'].'</td>
                        <td><img src='.$data['slika'].' width=60px height=60px></td>
                    </tr>
                ';
            }
            mysqli_close($db);
        ?>
        </tbody>
    </table>
   
    </div>
    </div>
    
    <?php if (isset($_SESSION['id'])) :  ?>
    <div style="text-align:center;margin-bottom:20px">
    <input type="button" class="btn btn-primary" value="Obrisi artikal" id="obrisi">
    <input type="button" class="btn btn-success" value="Dodaj artikal" id="dodaj">
    <input type="button" class="btn btn-danger" value="Izmeni artikal" id="izmeni">
    </div>
    <?php endif ?>
    
<form class="container" action="obrisi.php" method="POST" style="display:none;width:50%;border:2px solid red;margin:auto" id="upitnik1">
    <h2 >Zelite da obrisete artikal?</h2>
        <input type="text" class="form-control" name="sifra" placeholder="Unesi sifru artikla" required><br>        
        <input type="submit" class="btn btn-success" value="Sacuvaj" name="obrisi">
</form>

<form class="container" action="dodaj.php" method="POST" enctype="multipart/form-data" style="display:none;width:50%;border:2px solid red;margin:auto" id="upitnik2">
    <h2>Zelite da dodate artikal?</h2>   
        <input type="text" class="form-control" name="sifra2" placeholder="Unesi sifru artikla" required><br>        
        <input type="text" class="form-control" name="naziv2" placeholder="Unesi naziv artikla" required><br>    
        <textarea class="form-control" name="opis2" placeholder="Unesi opis artikla" rows="3" required></textarea><br>    
        <input type="text" class="form-control" name="cena2" placeholder="Unesi cenu artikla" required><br>
        <input type="text" class="form-control" name="velicina2" placeholder="Unesi velicinu artikla" required><br>
        <label for="kategorija2">Izaberi kategoriju</label>
            <select class="form-control"  id="kategorija2" name="kategorija2" required>
                <?php
                require "connection.php";
                $query="SELECT * FROM `kategorije`";
                $result = mysqli_query($db, $query);
                while($data=mysqli_fetch_array($result)){
                echo '<option>'.$data['naziv'].'</option>';
                }
                mysqli_close($db);
                ?>
                </select><br>
        <input type="file" name="slika" required><br>
        <input type="submit" class="btn btn-success" value="Sacuvaj" name="dodaj">        
</form>

<form class="container" action="izmeni.php" method="POST" style="display:none;width:50%;border:2px solid red;margin:auto" id="upitnik3">
    <h2>Zelite da izmenite artikal?</h2>   
        <input type="text" class="form-control" name="sifra3" placeholder="Unesi sifru artikla" required><br>        
        <input type="text" class="form-control" name="naziv3" placeholder="Unesi naziv artikla" required><br>    
        <textarea class="form-control" name="opis3" placeholder="Unesi opis artikla" rows="3" required></textarea><br>    
        <input type="text" class="form-control" name="cena3" placeholder="Unesi cenu artikla" required><br>
        <input type="text" class="form-control" name="velicina3" placeholder="Unesi velicinu artikla" required><br>
        <label for="kategorija3">Izaberi kategoriju</label>
            <select class="form-control"  id="kategorija3" name="kategorija3" required>
            <?php
                require "connection.php";
                $query="SELECT * FROM `kategorije`";
                $result = mysqli_query($db, $query);
                while($data=mysqli_fetch_array($result)){
                echo '<option>'.$data['naziv'].'</option>';
                }
                mysqli_close($db);
                ?>
            </select><br>
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

