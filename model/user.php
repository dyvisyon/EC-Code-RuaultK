<?php

require_once( 'database.php' );

class User {

  protected $id;
  protected $email;
  protected $password;
  protected $confirmkey;
  protected $confirmed;

  public function __construct( $user = null ) {

    if( $user != null ):
      $this->setId( isset( $user->id ) ? $user->id : null );
      $this->setEmail( $user->email );
      $this->setPassword( $user->password, isset( $user->password_confirm ) ? $user->password_confirm : false );
      $this->setConfirmkey($user->confirmkey);
    endif;
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setId( $id ) {
    $this->id = $id;
  }

  public function setEmail( $email ) {

    if ( !filter_var($email, FILTER_VALIDATE_EMAIL)):
      throw new Exception( 'Email incorrect' );
    endif;

    $this->email = $email;

  }

  public function setPassword( $password, $password_confirm = false ) {

    if( $password_confirm && $password != $password_confirm ):
      throw new Exception( 'Vos mots de passes sont différents' );
    endif;

    $this->password = hash("sha256", $password);
  }

  public function setConfirmkey($confirmkey)
    {
        $this->confirmkey = $confirmkey;
    }

    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;
    }

  /***************************
  * -------- GETTERS ---------
  ***************************/

  public function getId() {
    return $this->id;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getConfirmkey() {
    return $this->confirmkey;
  }

  public function getConfirmed() {
    return $this->confirmed;
  }

  

  /***********************************
  * -------- CREATE NEW USER ---------
  ************************************/

  public function createUser() {

    // Open database connection
    $db   = init_db();

    // Check if email already exist
    $req  = $db->prepare( "SELECT * FROM user WHERE email = ?" );
    $req->execute( array( $this->getEmail() ) );

    if( $req->rowCount() > 0 ) throw new Exception( "Email ou mot de passe incorrect" );

    // Insert new user
    $req->closeCursor();

    $req = $db->prepare("INSERT INTO user ( email, password, confirmkey, confirmed  ) VALUES ( :email, :password, :confirmkey, :confirmed )");
    
    $req->execute(array( 'email' => $this->getEmail(), 'password' => $this->getPassword(), 'confirmkey' => $this->getConfirmkey(), 'confirmed' => $this->getConfirmed() ));

    $user_mail = $this->getEmail();
    $confirmkey = $this->getConfirmkey();
    $message_confirm ='
    <html>
        <body>
            <div align="center">
                <a href="http://localhost:8888/index.php?mail='.urldecode($user_mail).'&key='.$confirmkey.'">Cliquez sur ce lien pour confirmer votre compte</a>
            </div>
        </body>
    </html>
    ';

    $headers = "MIME-Version: 1.0\r\n";
    $headers.= 'Content-Type: text/html; charset="utf-8"'."\n";
    $headers.= "FROM: donotreply@codflix.com";
    $headers.= 'Content-Transfer-Encoding: 8bit';

    mail($user_mail, 'Validation de compte', $message_confirm, $headers);
        

    // Close databse connection
    $db = null;

  }

  /**************************************
  * -------- GET USER DATA BY ID --------
  ***************************************/

  public static function getUserById( $id ) {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM user WHERE id = ?" );
    $req->execute( array( $id ));

    // Close databse connection
    $db   = null;

    return $req->fetch();
  }

  /***************************************
  * ------- GET USER DATA BY EMAIL -------
  ****************************************/

  public function getUserByEmail() {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM user WHERE email = ?" );
    $req->execute( array( $this->getEmail() ));

    // Close databse connection
    $db   = null;

    return $req->fetch();
  }

}
