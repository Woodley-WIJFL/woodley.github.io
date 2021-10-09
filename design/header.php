<?php
session_start();
    // $c = new PDO('mysql:host=localhost;dbname=vente', 'root', '');
?>
<header class="header">
    <div class="t">
        <center>
            <h1>Etablissement Trucmuche</h1>
        </center>
    </div>
    
    <div class="img">
    </div>
    <div class="nom" style="padding-top: -10px;">
        <?=  $_SESSION['prenom'] ?>
        <a style="font-size: 15px; border: 1px solid #fff;" href="index.php">Deconnexion</a>
        
    </div>
</header>