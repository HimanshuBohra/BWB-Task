<?php
    include 'dbProcessor.php';

    $flag = $_POST['flag'];
    $next = $_POST['next'];
    if($flag == 0){
        echo json_encode(showGoodusers());
    }
    else{
        echo json_encode(shownexttenGooduser($next));
    }
?>