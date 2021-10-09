<?php
$c = new PDO('mysql:host=localhost;dbname=vente', 'root', '');

if (isset($_POST['inscrire'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mot_de_passe = sha1($_POST['pwd']);
    $type_user = htmlspecialchars($_POST['user']);

    if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['mail']) and !empty($_POST['pwd'])) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

            $reqmail = $c->prepare("SELECT * FROM user WHERE mail=?");
            $reqmail->execute(array($mail));
            $mailexiste = $reqmail->rowCount();

            if ($mailexiste == 0) {

                if (strlen($mot_de_passe) > 3) {
                    $req = $c->prepare("INSERT INTO user(nom, prenom, mail, mot_de_passe, type_user) VALUES(?, ?, ?, ?, ?)");
                    $req->execute(array($nom, $prenom, $mail, $mot_de_passe, $type_user));
                    header('Location: index.php');
                }
            } else {
                $erreur = 'Ce mail existe deja !';
            }
        } else {
            $erreur = 'Votre adresse email n\'est pas correct !';
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
    <h1>Creer un compte</h1>
    <form method="post" action="">
        <table>
            <tr>
                <td><label for="">Nom</label></td>
                <td class="td"><input value="<?php if(isset($nom)){ echo $nom; } ?>" type="text" name="nom"></td>
            </tr>
            <tr>
                <td><label for="">Prenom</label></td>
                <td class="td"><input value="<?php if(isset($prenom)){ echo $prenom; } ?>" type="text" name="prenom"></td>
            </tr>
            <tr>
                <td><label for="">Email</label></td>
                <td class="td"><input value="<?php if(isset($mail)){ echo $mail; } ?>" type="email" name="mail"></td>
            </tr>
            <tr>
                <td><label for="">Mot-de-passe</label></td>
                <td class="td"><input type="password" name="pwd"></td>
            </tr>
            <tr>
                <td><label for="">Type Utilisateur</label></td>
                <td class="td">
                    <select name="user" id="">
                        <option>Vendeur</option>
                        <option>Comptable</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="btn"><input type="submit" value="S'inscrire" name="inscrire"></td>
            </tr>
        </table>
    </form>
    <p>J'ai deja un compte? <a href="index.php">se connecter</a></p>
    <h5 style="color:red; text-align: center;">
        <?php
        if (isset($erreur)) {
            echo $erreur;
        }
        ?>
    </h5>
</div>