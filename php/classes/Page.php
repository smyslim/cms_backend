<?php
  class Page{
    static function addPage($html,$css,$js,$name,$title){
      global $mysqli;
      $stmt = $mysqli->prepare("INSERT INTO `pages` (`html`, `css`, `js`,`name`,`title`) VALUES (?,?,?,?,?)");
      $stmt->bind_param('sssss', $html,$css,$js,$name,$title);
      $stmt->execute();
      $stmt->close();
      return json_encode(["result"=>"ok"]);
    }
    static function getPages(){
      global $mysqli;
      $result = $mysqli->query("SELECT * FROM `pages` WHERE 1");
      $data = [];
      $data = $result->fetch_all( MYSQLI_ASSOC ); //чтобы получить все строки из бд, вместо цикла можем использовать данную конструкцию
      return json_encode($data);
      //var_dump($data);
      /*while($row = $result->fetch_assoc()){
        $data[] = $row;
      }
      return json_encode($data);*/
    }
    static function editPage($pageId){
      global $mysqli;
      $result = $mysqli->query("SELECT * FROM `pages` WHERE `id`='$pageId'");
      $row;
      $row = $result->fetch_assoc();
      return json_encode($row);
    }
    static function updatePage($pageId,$name,$title,$html,$css,$js){
      global $mysqli;
      $stmt=$mysqli->prepare("UPDATE `pages` SET `name`=?,`title`=?,`html`=?,`css`=?,`js`=? WHERE `id`=?");
      $stmt->bind_param('sssssi',$name,$title,$html,$css,$js,$pageId);
      $stmt->execute();
      $stmt->close();
      return json_encode(["result"=>"ok"]);
    }
  }
?>
