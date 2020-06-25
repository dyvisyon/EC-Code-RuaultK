<?php


/***************************
 * ----- LOAD CONFIRM PAGE -----
 ***************************/

function confirmPage() {

    if(isset($_GET['mail'], $_GET['key']) AND !empty($_GET['mail']) AND !empty($_GET['key'])) {
        $alert = "";
        $mail = htmlspecialchars(urldecode($_GET['mail']));
        $key = htmlspecialchars($_GET['key']);

        $db   = init_db();
        $req_user = $db->prepare('SELECT * FROM user WHERE email = ? AND confirmkey = ?;');
        $req_user->execute(array($mail, $key));

        $user_exist = $req_user->rowCount();

        if($user_exist == 1) {
            $user = $req_user->fetch();
            if($user['confirmed'] == 0) {
                $update_user = $db->prepare('UPDATE user SET confirmed = 1 WHERE email = ? AND confirmkey = ?;');
                $update_user->execute(array($mail, $key));
                $alert = "Votre compte a bien été validé !";
            } else {
                $alert = "Il semblerait que votre compte a déjà été validé.";
            }
        } else {
            $alert = "L'utilisateur n'existe pas.";
        }
        $db   = null;
        }

    require('view/confirm.php');
}