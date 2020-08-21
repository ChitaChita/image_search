<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <title>画像検索</title>
    <link rel="stylesheet" href="./index.css" />
    <script src="./jquery.js"></script>
    <script src="./index.js"></script>
  </head>
  <body>
    <div id="logo">
<?php
  if(empty($_GET[search])){
    echo "<h1>海洋生物画像検索</h1>";
  }
?>
      
    </div>
    <div id="fake-box">
      <form>
        <input class="search-box" type="text" name="search" value="" placeholder="生物の名前または種類">
        <div class="fake-area">
          <input class="search-button" type="submit" name="submit" value="検索">
        </div>
      </form>
    </div>
    <div class="disp-box">
<?php
  if(!empty($_GET[search])){
    echo "<h2>" . htmlspecialchars($_GET[search]) . "の検索結果</h2>";
  }
?>
    </div>
    <ul id="image-list">
<?php
error_reporting(E_ALL);
// $keywords
// $imgList
$search = '';
$search = htmlspecialchars($_GET[search]);
require('./data/tag.php');
$dir_path = "./img";
if (is_dir($dir_path)) {
  if(is_readable($dir_path)) { 
    for ($i=0; $i < count($imgList) ; $i++) { 
      for ($cnt=0; $cnt < count($imgList[$i][1]) ; $cnt++) { 
        if ($search == $imgList[$i][1][$cnt]) {
          echo "<li class = \"".borderbox."\">";
          echo "<a href = " .urlencode(mb_convert_encoding($imgList[$i][0], "UTF-8")). "\" target = \"_blank\" class= \"" .modal. "\" >";
          echo "<img src = \"" .$imgList[$i][0]. "\" width=\"250\" height=\"180\" ></a> ";
          echo "</li>";
        }
      }
    }
  } else {
    echo "<p>" .htmlspecialchars($dir_path)."　は読み込みが許可されていません。</p>";
    }
} else {
  echo "<p>画像が保存されてません</p>";
}
?>
    </ul>
    <div id="graydisplay"></div>
  </body>