<?php

require_once( 'model/media.php' );

  /****************************
 * ----- LOAD MEDIA PAGE -----
****************************/

/*
    Display all medias
*/

function mediaPage() {

	$search = isset($_GET['title']) ? $_GET['title'] : null;
    if($search!=null){
        $medias = Media::filterMedias($search);
    }else{
        $medias = Media::displayMedias($search);
    }   

  require('view/mediaListView.php');

}

/*
    Displays media details
*/

function detailPage( $id ) {

    if ((isset ($id))){
        $media = Media::displayAMedia($id);
        require_once("view/detail.php");
    }
    
}



