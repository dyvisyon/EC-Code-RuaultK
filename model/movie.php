<?php

require_once( 'database.php' );

class Movie {

  protected $id;
  protected $title;
  protected $movie_url;

  public function __construct( $media ) {

    $this->setId( isset( $media->id ) ? $media->id : null );
    $this->setTitle( $media->title );
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setId( $id ) {
    $this->id = $id;
  }

  public function setTitle( $title ) {
    $this->title = $title;
  }

  /***************************
  * -------- GETTERS ---------
  ***************************/

  public function getId() {
    return $this->id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getMovieUrl() {
    return $this->movie_url;
  }

  /***************************
  * -------- GET LIST --------
  ***************************/

  public static function displayMovie( $title ) {

      $title = htmlentities($_GET['watchMovie']);
      $db   = init_db();
      $req = $db->query('SELECT * FROM media INNER JOIN movie On media.title = movie.title WHERE movie.title = \'' . $title . '\';');
      $req->execute(array( $title ));
      
      $db = null;
      return $req->fetch(PDO::FETCH_ASSOC);
  }

}
