<?php

require_once( 'model/movie.php' );


  /******************************
 * ----- LOAD WATCHER PAGE ----*
******************************/

/*
	Load the player of a movie
*/

function moviePage( $title ) {

    if ((isset ($title))){
        // $id_checked = (int)($id);
        $media = Movie::displayMovie($title);
        require_once("view/movieView.php");
    }
}