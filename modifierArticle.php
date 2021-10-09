<?php $c = mysqli_connect('localhost', 'root', '', 'vente'); ?>

<head>
    <link rel="stylesheet" href="./design/style.css">
    <link rel="stylesheet" href="sty.css">
</head>
<div class="corps">
    <?php include 'design/header.php'; ?>
    <div class="b-corps">
        <?php include './design/menu.php'; ?>
        <div class="modifier">
        <?php include 'modifier/traitementArticle.php'; ?>
            <?php
            $req = "SELECT * FROM article";
            $ex = $c->query($req);
            ?>
            <div class="lister-table">
                <table border="">
                    <tr>
                        <th>Reference</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                    </tr>
                    <?php while ($req = mysqli_fetch_array($ex)) { ?>
                        <tr>
                            <td><?= $req[0] ?></td>
                            <td><?= $req[1] ?></td>
                            <td><?= $req[2] ?></td>
                            <td><?= $req[3] ?></td>
                            <td>
                                <form action="" method="post">
                                    <input class="button" type="hidden" name="id" value="<?= $req[0] ?>">
                                    <input class="button" type="submit" value="modifier" name="modifier">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>