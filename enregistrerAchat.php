<?php
$c = mysqli_connect('localhost', 'root', '', 'vente');
if (isset($_POST['aAchat'])) {
    $id_client = $_POST['id_client'];
    $id_article = $_POST['id_article'];
    $quantite = $_POST['quantite'];
    $date = $_POST['date'];

    if (!empty($_POST['id_client']) and !empty($_POST['id_article']) and !empty($_POST['quantite']) and !empty($_POST['date'])) {
        $req = "INSERT INTO achat VALUES('','$id_client','$id_article','$quantite','$date')";
        $ex = $c->query($req);
        if ($ex) {
            $erreur = 'Achat Enregistrer';
            if ($erreur) {
                echo '<script>setTimeout(() => { location.href ="acceuil.php"; }, 3500);</script>';
            }
        } else {
            $erreur = 'erreur serveur';
        }
    } else {
        $erreur = 'Vous devez remplis tous les champs !';
    }
} 
// 
?>

<head>
    <link rel="stylesheet" href="./design/style.css">
    <link rel="stylesheet" href="sty.css">
</head>
<div class="corps">
    <?php include 'design/header.php'; ?>
    <div class="b-corps">
        <?php include './design/menu.php'; ?>

        <div class="formulaire">
            <!-- enregistrer  -->

            <div class="form-c active form-client" id="iclient">
                <form action="" method="post">
                    <table>
                        <tr>
                            <th colspan="2">Ajouter Achat</th>
                        </tr>
                        <tr>
                            <td><label for="">Numero Client</label></td>
                            <td class="td"><input type="number" min="1" name="id_client" value="<?php if (isset($id_client)) {
                                                                                                    echo $id_client;
                                                                                                } ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="">Numero Article</label></td>
                            <td class="td"><input type="number" min="1" name="id_article" value="<?php if (isset($id_article)) {
                                                                                                        echo $id_article;
                                                                                                    } ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="">Quantite</label></td>
                            <td class="td"><input type="number" min="1" name="quantite" value="<?php if (isset($quantite)) {
                                                                                                    echo $quantite;
                                                                                                } ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="">Date Vente</label></td>
                            <td class="td"><input type="date" name="date" value="<?php if (isset($date)) {
                                                                                        echo $date;
                                                                                    } ?>"></td>
                        </tr>
                        <tr>
                            <td><input class="button" type="submit" value="Effacer"></td>
                            <td><input class="button" type="submit" value="Ajouter" name="aAchat"></td>
                        </tr>
                    </table>
                </form>
                <h5 style="color:red; text-align: center;">
                    <?php
                    if (isset($erreur)) {
                        echo '<script>alert(\'' . $erreur . '\');</script>';
                    }
                    ?>
                </h5>
            </div>
        </div>
    </div>
</div>