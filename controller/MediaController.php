<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaPage() {

	$search = isset($_GET['title']) ? $_GET['title'] : null;
    if($search!=null){
        $medias = Media::filterMedias($search);
    }else{
        $medias = Media::displayMedias($search);
    }   

  require('view/mediaListView.php');

}

function detailPage( $id ) {

    if ((isset ($id))){
        // $id_checked = (int)($id);
        $media = Media::displayAMedia($id);
        require_once("view/detail.php");
    }
    
}



