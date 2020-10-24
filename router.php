<?php
  session_start();
  header("Access-Control-Allow-Origin: *");
  $uri=explode("/",$_SERVER['REQUEST_URI']);
  require_once('php/db.php');
  require_once('php/classes/Page.php');
  
  if ($uri[1] == "addPage"){
    exit(Page::addPage($_POST['html'],$_POST['css'],$_POST['js']));
  }

?>
