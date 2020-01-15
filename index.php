<?php
session_start();
?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
        .row div {
            height: 300px;
            border-bottom: 20px solid #AAADFF;
            border-right: 20px solid #AAADFF;
            text-align:center;
           
        }

        .row div:nth-child(even) {
            background-color: #6369FF;
        }

        .row div:nth-child(odd) {
            background-color: #B39622;
        }
        img{
            width:auto;
            height:180px;
            padding:10px;
        }
        body{
            background-color:#AAADFF;
        }
    </style>
<body>

<?php
require "header.php";
?>

<div class="container-fluid text-center" style="margin-top:100px">
	<h1>SVI ARTIKLI</h1>	
</div>

<div class='container'>
<?php
    require "connection.php";
    $query="SELECT * FROM `cipele`";
    $result = mysqli_query($db, $query);
    echo '<div class="row">';
    while($data=mysqli_fetch_array($result)){
        
        echo '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">'; 
        echo '<img src='.$data['slika'].'>';
        echo '<h6>'.$data['naziv'].'</h6>';
        echo '<h6> Sifra: '.$data['sifra'].'   Velicina: '.$data['velicina'].'</h6>';
        echo '<h6> Cena: '.$data['cena'].' RSD</h6>';
        echo '</div>';    
    }
    echo '</div>';

mysqli_close($db);
?>
</div>

<div style="height:80px; background-color:#191A40"></div>
</body>

</html>