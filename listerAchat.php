<head>
    <link rel="stylesheet" href="./design/style.css">
    <link rel="stylesheet" href="sty.css">
</head>
<div class="corps">
<?php include'design/header.php'; ?>
    <div class="b-corps">
        <?php include './design/menu.php'; ?>


        <?php
        $c = mysqli_connect('localhost', 'root', '', 'vente');
        $req = "SELECT * FROM achat";
        $ex = $c->query($req);
        ?>
        <div class="lister-table">
            <table border="">
                <tr>
                    <th>Numero Achat</th>
                    <th>Numero Client</th>
                    <th>Numero Article</th>
                    <th>Quantite Produit</th>
                    <th>Date Achat</th>
                </tr>
                <?php while ($req = mysqli_fetch_array($ex)) { ?>
                    <tr>
                        <td><?= $req[0] ?></td>
                        <td><?= $req[1] ?></td>
                        <td><?= $req[2] ?></td>
                        <td><?= $req[3] ?></td>
                        <td><?= $req[4] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>