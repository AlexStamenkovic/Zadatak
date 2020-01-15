<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:#191A40">
    <img class="navbar-brand" src="logo.jpg" style="height:60px;width:auto">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseid">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapseid">
        <ul class="navbar-nav text-right">
           
            <li class="nav-item">
                <a class="nav-link" href="index.php">POCETNA</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="artikli.php">ARTIKLI</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="kategorije.php">KATEGORIJE</a>
            </li>

            <?php if (isset($_SESSION['id']) && $_SESSION['id']>1) :  ?>

            <li class="nav-item">
                <a class="nav-link" href="korisnik.php">KORISNIK</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="odjava.php">ODJAVA</a>
            </li>

            <?php elseif (isset($_SESSION['id']) && $_SESSION['id']==1) :  ?>

            <li class="nav-item">
                <a class="nav-link" href="admin.php">ADMIN</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="odjava.php">ODJAVA</a>
            </li>

            <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="prijava_registracija.php">PRIJAVI SE/REGISTRUJ SE</a>
            </li>
            <?php endif ?>
               
        </ul>
    
    </div>
</nav>
