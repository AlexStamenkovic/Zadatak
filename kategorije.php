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
    .container{
        margin-top:50px;
    }
</style>
<body>
    <?php
    require "header.php";
    ?>
    <br><br><br><br>
    <h2 style="text-align:center">SVE VRSTE CIPELA</h2>

    <div class="container">
    <div class="table-responsive">
    <table id="tabela" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th width="10%">Broj</th>
                <th width="10%">Naziv</th>
            </tr>
        </thead>
        <tbody>
        <?php
            require "connection.php";
            $query="SELECT * from `kategorije`";
            $result=mysqli_query($db,$query);
            while($data=mysqli_fetch_array($result)){
                echo '
                    <tr>
                        <td>'.$data['broj'].'</td>
                        <td>'.$data['naziv'].'</td>
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
    <input type="button" class="btn btn-primary" value="Obrisi kategoriju" id="obrisi">
    <input type="button" class="btn btn-success" value="Dodaj kategoriju" id="dodaj">
    <input type="button" class="btn btn-danger" value="Izmeni kategoriju" id="izmeni">
    </div>
    <?php endif ?>

    <form class="container" action="obrisi_kategoriju.php" method="POST" style="display:none;width:50%;border:2px solid red;margin:auto" id="upitnik1">
        <h3 >Zelite da obrisete kategoriju?</h3>
        <input type="text" class="form-control" name="naziv" placeholder="Unesi naziv kategorije" required><br>        
        <input type="submit" class="btn btn-success" value="Sacuvaj" name="obrisi">
    </form>

    <form class="container" action="dodaj_kategoriju.php" method="POST" style="display:none;width:50%;border:2px solid red;margin:auto" id="upitnik2">
        <h3 >Zelite da dodate kategoriju?</h3>
        <input type="text" class="form-control" name="naziv2" placeholder="Unesi naziv kategorije" required><br>        
        <input type="submit" class="btn btn-success" value="Sacuvaj" name="dodaj">
    </form>

    <form class="container" action="izmeni_kategoriju.php" method="POST" style="display:none;width:50%;border:2px solid red;margin:auto" id="upitnik3">
        <h3 >Zelite da izmenite kategoriju?</h3>
        <input type="text" class="form-control" name="broj" placeholder="Unesi redni broj kategorije" required><br>
        <input type="text" class="form-control" name="naziv3" placeholder="Unesi novi naziv" required><br>        
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