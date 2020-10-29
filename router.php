<?php
  session_start();
  header("Access-Control-Allow-Origin: *");
  $uri=explode("/",$_SERVER['REQUEST_URI']);
  require_once('php/db.php');
  require_once('php/classes/Page.php');
  
  if ($uri[1] == "addPage"){
    exit(Page::addPage($_POST['html'],$_POST['css'],$_POST['js'],$_POST['name'],$_POST['title']));
  }
  if ($uri[1] == "getPages"){
    exit(Page::getPages());
  }
  if ($uri[1] == "editPage"){
    exit(Page::editPage($_POST['pageId']));
  }
  if ($uri[1] == "updatePage"){
    exit(Page::updatePage($_POST['pageId'],$_POST['name'],$_POST['title'],$_POST['html'],$_POST['css'],$_POST['js']));
  }
?>
