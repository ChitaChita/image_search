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
      <h1>海洋生物画像検索</h1>
    </div>
    <div id="fake-box">
      <form>
        <input class="search-box" type="text" name="search" value="" placeholder="生物の名前または種類">
        <div class="fake-area">
          <input class="search-button" type="submit" name="submit" value="検索">
        </div>
      </form>
    </div>
    <ul id="image-list">
<?php
// $keywords
// $imgList
require_once('./data/tag.php');
//ディレクトリ名
$dir_path = "./img";
if (is_dir($dir_path)) {
  if(is_readable($dir_path)) { 
    // ? ファイルが読み込み可能かどうか
    $ch_dir = dir($dir_path); //ディレクトリクラス
    //ディレクトリ内の画像を一覧表示
    while (false !== ($file_name = $ch_dir -> read())) {
      $ln_path = $ch_dir -> path . "/" .$file_name;
        if (@getimagesize($ln_path)) { 
          echo "<li class = \"".borderbox."\">";
          echo "<a href = \"imgview.php?d=" .urlencode(mb_convert_encoding($ln_path, "UTF-8")). "\" target = \"_blank\" class= \"" .modal. "\" >";
          echo "<img src = \"" .$ln_path. "\" width=\"250\" height=\"180\" ></a> ";
          echo "</li>";
        }
      }
      $ch_dir -> close();
    } else
    {
    echo "<p>" .htmlspecialchars($dir_path)."　は読み込みが許可されていません。";
    }
    }
    else
    {
    echo 'DIR 画像がないよ';
}
?>
    </ul>
    <div id="graydisplay"></div>
  </body>