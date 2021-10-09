<?php
$con=mysqli_connect('localhost', 'root','','vente');


if (isset($_POST['update'])) {
    // header('Location: index.php');
    $idi = $_POST['id'];
    $id_client=$_POST['id_client'];
    $id_article=$_POST['id_article'];
    $quantite=$_POST['quantite'];
    $date=$_POST['date'];

    $modifier ="UPDATE achat SET id_client='$id_client', id_article='$id_article', quantite='$quantite', datez='$date' WHERE id_achat='$idi'";
    $d=$con->query($modifier);
    if ($d) {
        echo '<script>alert(\'modification effectuer\');</script>';
    } else {
        echo '<script>alert(\'erreur\');</script>';
    }

}

if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $req = mysqli_query($c, "SELECT * FROM achat WHERE id_achat='$id'");
    $res = mysqli_fetch_array($req);
?>

    <div class="form-c form-client" id="iclient">
        <form action="" method="post">
            <table>
                <tr>
                    <th colspan="2">Modifier Achat</th>
                </tr>
                <input type="hidden" name="id" value="<?= $res[0] ?>" placeholder="llll">
                <tr>
                    <td><label for="">Numero Client</label></td>
                    <td class="td"><input type="number" min="1" name="id_client" value="<?= $res[1] ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Numero Article</label></td>
                    <td class="td"><input type="number" min="1" name="id_article" value="<?= $res[2] ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Quantite</label></td>
                    <td class="td"><input type="number" min="1" name="quantite" value="<?= $res[3] ?>"></td>
                </tr>
                <tr>
                    <td><label for="">Date Vente</label></td>
                    <td class="td"><input type="date" name="date" value="<?= $res[4] ?>"></td>
                </tr>
                <tr>
                    <td><input class="button" type="submit" value="Effacer"></td>
                    <td><input class="button" type="submit" value="Modifier" name="update"></td>
                </tr>
            </table>
        </form>
    </div>
<?php } ?>