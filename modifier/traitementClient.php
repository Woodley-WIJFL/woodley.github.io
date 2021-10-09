<?php
$con=mysqli_connect('localhost', 'root','','vente');


if (isset($_POST['update'])) {
    // header('Location: index.php');
    $idi = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];
    $telephone = $_POST['telephone'];

    $modifier ="UPDATE client SET nom='$nom', prenom='$prenom', adresse='$adresse', code_postal='$code_postal', ville='$ville', pays='$pays', telephone='$telephone' WHERE numero='$idi'";
    $d=$con->query($modifier);
    if ($d) {
        echo '<script>alert(\'modification effectuer\');</script>';
    } else {
        echo '<script>alert(\'erreur\');</script>';
    }
}


if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $req = mysqli_query($c, "SELECT * FROM client WHERE numero='$id'");
    $res = mysqli_fetch_array($req);

?>
    <div class="form-c active form-client" id="iclient">
        <form action="" method="post">
            <table>
                <tr>
                    <th colspan="2">Modifier Client</th>
                </tr>

            <input type="hidden" value="<?= $res[0] ?>" name="id" placeholder="Entrer le nom du client"></td>
                <tr>
                    <td><label for="">Nom</label></td>
                    <td class="td"><input type="text" minlength="3" maxlength="20" value="<?= $res[1] ?>" name="nom" placeholder="Entrer le nom du client"></td>
                </tr>
                <tr>
                    <td><label for="">Prenom</label></td>
                    <td class="td"><input type="text" minlength="4" maxlength="40" value="<?= $res[2] ?>" name="prenom" placeholder="Entrer le prenom du client" value="<?php if (isset($prenom)) {
                                                                                                                                                                            echo $prenom;
                                                                                                                                                                        } ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Adresse</label></td>
                    <td class="td"><input type="text" minlength="5" maxlength="100" name="adresse" value="<?= $res[3] ?>" placeholder="Entre l'adresse du client" value="<?php if (isset($adresse)) {
                                                                                                                                                                                echo $adresse;
                                                                                                                                                                            } ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Code Postal</label></td>
                    <td class="td"><input type="" name="code_postal" minlength="5" maxlength="20" value="<?= $res[4] ?>" placeholder="Entre le code postal du client" value="<?php if (isset($code_postal)) {
                                                                                                                                                                                    echo $code_postal;
                                                                                                                                                                                } ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Ville</label></td>
                    <td class="td"><input type="text" name="ville" placeholder="Entrer la ville du client" value="<?= $res[5] ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Pays</label></td>
                    <td class="td">
                        <select name="pays" value="<?= $res[6] ?>" class="input">
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
                    <td class="td"><input type="text" minlength="8" maxlength="20" name="telephone" value="<?= $res[7] ?>" placeholder="Telephone :+(509) * * * * * * * *" value="<?php if (isset($telephone)) {
                                                                                                                                                                                        echo $telephone;
                                                                                                                                                                                    } ?>"></td>
                </tr>
                <tr>
                    <td><input class="button" type="submit" value="Annuler"></td>
                    <td><input class="button" type="submit" name="update" value="Modifier"></td>
                </tr>
            </table>
        </form>
    </div>
<?php } ?>
