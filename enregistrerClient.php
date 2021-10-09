<?php
$c = mysqli_connect('localhost', 'root', '', 'vente');

if (isset($_POST['aClient'])) {
    $erreur = 'voila';
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];
    $telephone = $_POST['telephone'];
    if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['adresse']) and !empty($_POST['code_postal']) and !empty($_POST['ville']) and !empty($_POST['pays']) and !empty($_POST['telephone'])) {
        $req = "INSERT INTO client VALUES('', '$nom', '$prenom', '$adresse', '$code_postal', '$ville', '$pays', '$telephone')";
        $ex = $c->query($req);
        if ($ex) {
            $erreur = 'Client Enregistrer';
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
// $req = "INSERT INTO client VALUES('', '$nom', '$prenom', '$adresse', '$code_postal', '$ville', '$pays', '$telephone')";
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
                            <th colspan="2">Ajouter Client</th>
                        </tr>
                        <tr>
                            <td><label for="">Nom</label></td>
                            <td class="td"><input type="text" minlength="3" maxlength="20" value="<?php if (isset($nom)) {
                                                                            echo $nom;
                                                                        } ?>" name="nom" placeholder="Entrer le nom du client"></td>
                        </tr>
                        <tr>
                            <td><label for="">Prenom</label></td>
                            <td class="td"><input type="text" minlength="4" maxlength="40" name="prenom" placeholder="Entrer le prenom du client" value="<?php if (isset($prenom)) {
                                                                                                                                echo $prenom;
                                                                                                                            } ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="">Adresse</label></td>
                            <td class="td"><input type="text" minlength="5" maxlength="100" name="adresse" placeholder="Entre l'adresse du client" value="<?php if (isset($adresse)) {
                                                                                                                                echo $adresse;
                                                                                                                            } ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="">Code Postal</label></td>
                            <td class="td"><input type="" name="code_postal" minlength="5" maxlength="20" placeholder="Entre le code postal du client" value="<?php if (isset($code_postal)) {
                                                                                                                                        echo $code_postal;
                                                                                                                                    } ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="">Ville</label></td>
                            <td class="td"><input type="text" name="ville" placeholder="Entrer la ville du client" value="<?php if (isset($ville)) {
                                                                                                                                echo $ville;
                                                                                                                            } ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="">Pays</label></td>
                            <td class="td">
                                <select name="pays" class="input">
                                    <option>Haiti</option>
                                    <option>Republique Dominicaine</option>
                                    <option>Jamaique</option>
                                    <option>Honduras</option>
                                    <option>Cuba</option>
                                    <option>Etats-Unis</option>
                                    <option>Bresil</option>
                                    <option>France</option>
                                    <option>Canada</option>
                                    <option>Mexique</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="">Telephone</label></td>
                            <td class="td"><input type="text" minlength="8" maxlength="20" name="telephone" placeholder="Telephone :+(509) * * * * * * * *" value="<?php if (isset($telephone)) {
                                                                                                                                            echo $telephone;
                                                                                                                                        } ?>"></td>
                        </tr>
                        <tr>
                            <td><input class="button" type="submit" value="Effacer"></td>
                            <td><input class="button" type="submit" value="Ajouter" name="aClient"></td>
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