<?php 
// Исходные данные путь текстого документа с нужным форматом, и значение ключа
	$filename = "doc/text2.txt";	
	function createTxt($filename){
		
		while ($n <= 4000) {
			$n++;
			$str_key = bin2hex(random_bytes(4000));
			$str_val = bin2hex(random_bytes(4000));			
			$str_key_val = $str_key.'\t'.$str_val;
			$str=$str_key_val.'\x0A'.$str;
		}
		if ($file = file_get_contents($filename)) {
			$str = $file.$str;
		}
		file_put_contents($filename, $str);
		// var_dump($str_key);
		// var_dump($str_val);
		// var_dump($str);
	}
	
 ?>