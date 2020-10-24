<?php
  class Page{
    static function addPage($html,$css,$js){
      global $mysqli;
      $stmt = $mysqli->prepare("INSERT INTO `pages` (`html`, `css`, `js`) VALUES (?,?,?)");
      $stmt->bind_param('sss', $html,$css,$js);
      $stmt->execute();
      $stmt->close();
      return json_encode(["result"=>"ok"]);
    }
  }

?>
