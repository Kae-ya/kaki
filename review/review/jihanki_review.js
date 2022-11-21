function chat() {
	// データベースに接続する
	//データベースへの接続情報をここに書き込むことでデータベースと接続することができる
	//chromeの検証ページでconsole.logで見ることができる
	const mysql = require('mysql');
	const connection = mysql.createConnection({
		host: '',
		user: '',
		password: '',
		database: ''
	});
	
	connection.connect((err) => {
		if (err) throw err;
		console.log('Connected!');
	});
	//セレクトで最新の20個を取得するSQL文を記載する
	//データベースのリストを取得することができる
	connection.query('SELECT * FROM user', (err,rows) =>{
		if(err) throw err;
		
		console.log(rows);
	});
	//HTMLに入力できる　div1でHTMLの入力したい位置の指定ができる
	//<div id='div1'>のHTMLの場合は以下のようにdiv1でdiv1の関数内に書き込むことができる
	//for文でリストの値を取得して、for文で回す回数を指定できるようにする回している回数を変数にして、<div name='baloon変数'>
	//
	let div1 = document.getElementById('div1'):
		div1.insertAdjacentHTML('afterend', '<div name='baloon')
}

//1000ミリ秒に一度関数chatを実行することができる
setInterval('chat()',1000)