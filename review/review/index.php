<?php
 include 'db_config.php';
//$name = array();
  $comment = array();
  try
  {
     // DBと接続
     $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // コメント一覧を取得
     $stmt = $db->query("SELECT * FROM comment_ven ORDER BY id DESC LIMIT 20");
   //$name = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $comment = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $db = null;
     
      }
      catch(PDOException $e)
      {
       echo $e->getMessage();
       exit;
      }

      echo "<html>\n";
      echo "  <head>\n";
      echo "    <meta charset=\"UTF-8\">\n";
      echo "    <title>自販機レビュー一覧ページ</title>\n";
      echo "    <link rel=\"stylesheet\" href=\"index.css\">\n";
      echo "    </head>\n";
      echo "  <body>  \n";
      echo "    <div class=\"bbooxx\">\n";
      echo "     <img class=\"box_imageLeft\" src=\"img/kakihidari.JPG\" width=\"100\" height=\"100\">\n";
      echo "     <img class=\"box_imageRight\" src=\"img/kakimigi.JPG\" width=\"100\" height=\"100\">\n";
      echo "    </div>\n";
      echo "    <div class=\"solid1\">みんなのレビュー</div>\n";
             
      foreach($comment as $p)
      {        
        $comment = $p['comment'];
        $name = $p['name'];    
        echo "<div class=\"balloon1\"> ニックネーム　<u><strong>$name</strong></u>　さんより<br> <h3>$comment</h3> とコメントをいただきました！ </div>";          
      }

      echo "    <div id=\"sampleFooter\" class=\"footerStyle\">\n";
      echo "     <p><a href=\"FaceAPI.html\" class=\"button\">レビューする！   ≫</a></p>\n";
      echo "     <div class=\"Small\">自販機レビューをされる方は  　　　　　　　　　      自動販売機と牡蠣のレビューをしていただいた方全員      　    　　　　　   </div>\n";
      echo "     <div class=\"Big\">←ボタンをクリック！　　次回、牡蠣一つプレゼント!!!　　　</div>\n";
      echo "    </div>\n";
      echo "  </body>\n";
      echo "</html>";
?>

<SCRIPT LANGUAGE="JavaScript">
<!--
setInterval("location.reload()",1000*60);
-->
</SCRIPT>