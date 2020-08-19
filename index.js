$(function(){
  //画像ポップアップ（モーダル画面に遷移）
  $(".modal").on("click", function() {
    $("#graydisplay").html($(this).prop('outerHTML'));
    $("#graydisplay").fadeIn(500);
    return false;  //画像パスに遷移するのを防ぐ
  });
  //モーダル画面終了
  $("#graydisplay, #graydisplay img").on("click", function() {
    $("#graydisplay").fadeOut(500);
    return false;  //画像パスに遷移するのを防ぐ
  });
});