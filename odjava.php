<?php
session_start();
session_destroy();
header("location: prijava_registracija.php");
?>