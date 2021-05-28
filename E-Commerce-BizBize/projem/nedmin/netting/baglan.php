<meta charset="utf-8">
<?php 


try {



	$db=new PDO("mysql:host=localhost;dbname=c2c;charset=utf8",'root','');

	//echo "veritabanı bağlantısı başarılı";

}



catch (PDOExpception $e) {



	echo $e->getMessage();

}



 ?>