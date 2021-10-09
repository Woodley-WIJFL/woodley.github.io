<?php
$con=mysqli_connect('localhost', 'root','','vente');


if (isset($_POST['update'])) {
    $idi=$_POST['id'];
    $nom=$_POST['nom'];
    $description=$_POST['description'];
    $prix=$_POST['prix'];
    $modifier="UPDATE article SET nom='$nom', description='$description', prix='$prix' WHERE reference='$idi'";
    $d=$con->query($modifier);
    if ($d) {
        echo '<script>alert(\'modification effectuer\');</script>';
    } else {
        echo '<script>alert(\'erreur\');</script>';
    }
}


if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $req = mysqli_query($c, "SELECT * FROM article WHERE reference='$id'");
    $res = mysqli_fetch_array($req);

    
    ?>

<div class="form-c active form-client" id="iclient">
                <form action="" method="post">
                    <table>
                        <tr>
                            <th colspan="2">Modifier Article</th>
                        </tr>
                        <input type="hidden" name="id" value="<?= $res[0] ?>">
                        <tr>
                            <td><label for="">Nom Article</label></td>
                            <td class="td"><input minlength="3" maxlength="30" type="text" name="nom" placeholder="Nom article" value="<?= $res[1] ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="">Descrition</label></td>
                            <td class="td"><input minlength="10" maxlength="255" class="description" type="description" name="description" placeholder="Description" value="<?= $res[2] ?>"><br></td>
                        </tr>
                        <tr>
                            <td><label for="">Prix</label></td>
                            <td class="td"><input type="number" min="1" name="prix" value="<?= $res[3] ?>"></td>
                        </tr>
                        <tr>
                            <td><input class="button" type="submit" value="Effacer"></td>
                            <td><input class="button" type="submit" value="Modifier" name="update"></td>
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
<?php } ?>