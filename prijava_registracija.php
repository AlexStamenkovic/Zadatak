<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Prijava/Registracija</title>
</head>
<style>
     body{
            background-color:#AAADFF;
        }
</style>
<body>

<?php
require "header.php";
?>

<div id="mainD" style="margin-top:100px">
        <div class="row">
            <div class="container col-md-5  mt-3 mb-3">
                <form class="container" id='formular1' action="prijava.php" method="POST">
                    <div class="col-sm-12 leva">
                        <div id='omotac'>
                            <h3>PRIJAVI SE</h3>
                        </div>
                        <input type="text" class="form-control border-danger m-2" id="ime" name="ime"
                            placeholder="Unesi korisnicko ime..." required>
                        <input type="email" class="form-control border-danger m-2" id="email" name="email"
                            placeholder="Unesi email..." required>
                        <button type="submit" class="btn btn-secondary m-2" name='btnLog'>PRIJAVI ME</button>
                    </div>
                </form>
            </div>

            <div class="container col-md-5 mt-3 mb-3">
                <form class="container" id='formular2' action="registracija.php" method="POST">
                    <div class="col-sm-12 desna">
                        <h3>REGISTRUJ SE</h3>
                        <input type="text" class="form-control border-danger m-2" id="ime2" name="ime2"
                            placeholder="Unesi korisnicko ime..." required>
                        <input type="email" class="form-control border-danger m-2" id="email2" name="email2"
                            placeholder="Unesi email..." required>
                        <button type="submit" class="btn btn-secondary m-2" name='btnReg'>REGISTRUJ ME</button>
                    </div>
                </form>
            </div>
        </div>

</body>
</html>