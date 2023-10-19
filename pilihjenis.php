<?php 
if (isset($_POST['url'])) {
    $url  = $_POST['url'];

    header("Location: ".$url);
    exit;
}

?>