# うむちゃん

うむちゃんは牡蠣自動販売機の在庫状況や売り上げ計算を自動で通知するシステムです。  
  
  
## reviewの各ファイルの機能
- ### db_config.php, db_config2.php
　DBへ接続するための情報です。  
  
- ### index.php, index.css  
　ホーム画面を表示します。  
  
- ### jihanki_review.html, test.php, jihanki_review.css  
　自動販売機に関するレビューを投稿するページです。

- ### kaki_review.html, kaki_review.php, kaki_review.css  
　牡蠣に関するレビューを投稿するページです。  
  
- ### FaceAPI.html, login.php, register.php, touroku.php  
　FaceAPIを用いた登録・ログイン機能です。  
　同じ人物が複数回レビューを投稿できないようにします。  

## Arduino-raspiの各ファイルの機能
- ### Arduino_serial.ino
　ホールセンサーの値を取得し、Raspberry Pi3へシリアル通信で送信します。

- ### vending_raspi.py
　自動販売機の在庫情報を管理します。  
　Arduinoから受け取った値をDBへ送信します。

## richmenuのファイルの機能
- ### richmenu1.json, richmenu2.json, richmenu3.json
　LINEbotのリッチメニューの設定に関するファイルです。
