<?php
session_start();
$c = new PDO('mysql:host=localhost;dbname=vente', 'root', '');
$m=mysqli_connect('localhost', 'root', '', 'vente');
if (isset($_POST['connecter'])) {
    $mail = htmlspecialchars($_POST['mail']);
    $mot_de_passe = sha1($_POST['psw']);
    if (!empty($_POST['mail']) and !empty($_POST['psw'])) {
        $requser = $c->prepare("SELECT * FROM user WHERE mail= ? AND mot_de_passe= ?");
        $requser->execute(array($mail, $mot_de_passe));
        $userexiste = $requser->rowCount();

        if ($userexiste == 1) {

            $prenom=$requser->fetch();
            $_SESSION['prenom']=$prenom['prenom']; 
            $_SESSION['type_user']=$prenom['type_user']; 
            header('Location: acceuil.php');
        } else {
            $erreur = 'Mail ou Mot de passe incorrect !';
        }
    } else {
        $erreur = 'Vous devez remplis tous les champs !';
    }
}
?>

<head>
    <link rel="stylesheet" href="./design/style1.css">
</head>
<div class="login">
    <h1>Se connecter</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="">Entrer votre email</label></td>
                <td class="td"><input type="email" name="mail"></td>
            </tr>
            <tr>
                <td><label for="">Mot-de-passe</label></td>
                <td class="td"><input type="password" name="psw"></td>
            </tr>
            <tr>
                <td colspan="2" class="btn"><input type="submit" value="Connecter" name="connecter"></td>
            </tr>
        </table>
    </form>
    <p>Avez-vous un compte? <a href="creer-compte.php"> Creer un Compte</a></p>
    <h5 style="color:red; text-align: center;">
        <?php
        if (isset($erreur)) {
            echo $erreur;
        }
        ?>
    </h5>
</div>