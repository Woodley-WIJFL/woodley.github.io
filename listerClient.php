<head>
    <link rel="stylesheet" href="./design/style.css">
    <link rel="stylesheet" href="sty.css">
</head>
<div class="corps">
    <?php include 'design/header.php'; ?>
    <div class="b-corps">
        <?php include './design/menu.php'; ?>

        <?php
        $c = mysqli_connect('localhost', 'root', '', 'vente');
        $req = "SELECT * FROM client";
        $ex = $c->query($req);
        ?>
        <div class="lister-table">
            <table border="">
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Adresse</th>
                    <th>Code Postal</th>
                    <th>Ville</th>
                    <th>Pays</th>
                    <th>Telephone</th>
                </tr>
                <?php while ($req = mysqli_fetch_array($ex)) { ?>
                    <tr>
                        <td><?= $req[0] ?></td>
                        <td><?= $req[1] ?></td>
                        <td><?= $req[2] ?></td>
                        <td><?= $req[3] ?></td>
                        <td><?= $req[4] ?></td>
                        <td><?= $req[5] ?></td>
                        <td><?= $req[6] ?></td>
                        <td><?= $req[7] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>