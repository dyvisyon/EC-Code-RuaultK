<?php

require_once( 'database.php' );

class Series {

  protected $id;
  protected $title;
  protected $season_num;
  protected $episode_num;
  protected $episode_url;

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

  public function getSeasonNum() {
    return $this->season_num;
  }

  public function getEpisodeNum() {
    return $this->episode_num;
  }

  public function getEpisodeUrl() {
    return $this->episode_url;
  }

    /***************************
   * -------- GET LIST --------
  ***************************/

  public static function displaySeries( $title ) {

      $title = htmlentities($_GET['Series']);
      $db   = init_db();
      $req = $db->query('SELECT * FROM media INNER JOIN series On media.title = series.title WHERE series.title = \'' . $title . '\';');
      $req->execute(array( $title ));
      
      $db = null;
      return $req->fetchAll();
  }

}
