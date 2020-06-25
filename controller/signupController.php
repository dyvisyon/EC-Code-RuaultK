<?php

require_once( 'model/user.php' );

  /****************************
 * ----- LOAD SIGNUP PAGE ----
****************************/

function signupPage() {

  $user     = new stdClass();
  $user->id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  if( !$user->id ):
    require('view/auth/signupView.php');
  else:
    require('view/homeView.php');
  endif;

}

   /**************************
  * ----- SIGNUP FUNCTION ---
 **************************/

function signup( $post ) {

    $user = new User();

    try {
        $user->setEmail($post['email']);
    } catch (Exception $e) {
        $error_msg = 'Email invalide.';
    }
    try {
        $user->setPassword($post['password'], $post['password_confirm']);
    } catch (Exception $e) {
        $error_msg = 'Les mots de ne sont pas identiques.';
    }

    $confirmed = 0;
    $user->setConfirmed($confirmed);

    $key_size = 20;
    $key = "";
    for($i=1;$i<$key_size;$i++){
        $key .= mt_rand(0,9);
    }
    $user->setConfirmkey($key);

    try {
        $user->createUser();
        $msg = 'On y est presque ! Un mail vous a été envoyé pour valider votre compte.';
    } catch (Exception $e) {
        $error_msg = 'Email déjà utilisé.';
    }

    require('view/auth/signupView.php');

}