<?php

require_once( 'model/series.php' );


/******************************
* ----- LOAD WATCHER PAGE ----*
******************************/
function seriesPage( $title ) {

    if (isset ($title)){
        $media = Series::displaySeries($title);
        require_once("view/seriesView.php");
    }
}