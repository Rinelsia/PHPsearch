<?php
// Исходные данные путь текстого документа с нужным форматом, и значение ключа
$filename = "doc/text2.txt";
$val_key = 'fdf93d3d8afa1a17d9bb6f6a0cefd607ba9444a4342a9d4905f795b1d9238c9cc9762a727f80af39';
// функция поиска значения по ключу
function searchKeyVal($filename, $val_key){
	$file = file_get_contents($filename);
	$file_parse = explode('\x0A', $file);

	array_multisort($file_parse, SORT_ASC);
	$leng = count($file_parse);
	var_dump($leng);
	while ($leng >= 1) {
		$leng = intdiv(count($file_parse), 2);//целочисленное деление, выбор порядок ключа файлового массива
		$arr_file = explode('\t', $file_parse[$leng]);
		// var_dump($arr_file);
		if ($arr_file[0]==$val_key) {
			$str = "'['$arr_file[0]']' => $arr_file[1]";
			break;
		}elseif($arr_file[0]<$val_key){
			$file_parse = array_slice($file_parse, $leng, count($file_parse));
			$str = "undef";
		}else{
			$file_parse = array_slice($file_parse, 0, $leng);
			$str = "undef";
		}
	}
	// var_dump($file_parse);
	echo "$str";
}
// searchKeyVal($filename, $val_key);
include "index1.php";
createTxt($filename);
?>