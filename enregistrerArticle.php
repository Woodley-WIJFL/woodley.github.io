<?php
$c = mysqli_connect('localhost', 'root', '', 'vente');

if (isset($_POST['aArticle'])) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];

    if (!empty($_POST['nom']) and !empty($_POST['description']) and !empty($_POST['prix'])) {
        $req = "INSERT INTO article VALUES('','$nom','$description','$prix')";
        $ex = $c->query($req);
        if ($ex) {
            $erreur = 'Article Enregistrer';
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
// $req = "INSERT INTO article VALUES('','$nom','$description','$prix')";
// $ex = $c->query($req);
?>

<head>
    <link rel="stylesheet" href="./design/style.css">
    <link rel="stylesheet" href="sty.css">
</head>
<div class="corps">
<?php include'design/header.php'; ?>
    <div class="b-corps">
        <?php include './design/menu.php'; ?>

        <div class="formulaire">
            <!-- enregistrer  -->

            <div class="form-c active form-client" id="iclient">
                <form action="" method="post">
                    <table>
                        <tr>
                            <th colspan="2">Ajouter Article</th>
                        </tr>
                        <tr>
                            <td><label for="">Nom Article</label></td>
                            <td class="td"><input minlength="3" maxlength="30" type="text" name="nom" placeholder="Nom article" value="<?php if (isset($nom)) {
                                                                                                                echo $nom;
                                                                                                            } ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="">Descrition</label></td>
                            <td class="td"><input minlength="10" maxlength="255" class="description" type="description" name="description" placeholder="Description" value="<?php if (isset($description)) {
                                                                                                                                            echo $description;
                                                                                                                                        } ?>"><br></td>
                        </tr>
                        <tr>
                            <td><label for="">Prix</label></td>
                            <td class="td"><input type="number" min="1" name="prix" value="$"></td>
                        </tr>
                        <tr>
                            <td><input class="button" type="submit" value="Effacer"></td>
                            <td><input class="button" type="submit" value="Ajouter" name="aArticle"></td>
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