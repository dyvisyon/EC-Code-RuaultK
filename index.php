<?php
ini_set('display_errors', 'on');

require_once( 'controller/homeController.php' );
require_once( 'controller/loginController.php' );
require_once( 'controller/signupController.php' );
require_once( 'controller/mediaController.php' );

/**************************
* ----- HANDLE ACTION -----
***************************/

if ( isset( $_GET['action'] ) ):

  switch( $_GET['action']):

    case 'login':

      if ( !empty( $_POST ) ) login( $_POST );
      else loginPage();

    break;

    case 'signup':

      if ( !empty( $_POST ) ) signup( $_POST );
      else signupPage();

    break;

    case 'mediaList':

      $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
      if ($user_id):
          mediaPage();
      else:
          homePage();
      endif;

    break;

    case 'logout':

      logout();

    break;

  endswitch;

else:

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    if ($user_id):
        if(isset($_GET['media'])){
            detailPage($_GET['media']);
        } else {
            mediaPage();
        }
    else:
        homePage();
    endif;

endif;
