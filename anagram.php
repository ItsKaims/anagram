<?php 
//include 'lemmad.txt';
$file_words = array();

function create_anagram_array() {
	$file_lines = file('lemmad.txt');
	foreach ($file_lines as $line) {
    	$file_words[] = utf8_encode($line);
	}
	$result = json_encode($file_words);
	$result = str_replace( array("\r", "\r\n", "\n" ), '', $file_words);
	return $result;
}

//var_dump(create_anagram_array());

function find_anagram($word1, $word2) {
	$count = 0;
		if (strlen($word1) == strlen($word2)) {
				if (count_chars(strtolower($word1), 1) == count_chars(strtolower($word2), 1)) {
					echo $word2 . '<br />';	
				}
				
			}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Anagram</title>
</head>
<body>
<form action="?" method="POST">
	Sisesta sõna, mille anagrammi otsid<br>
	<input type="text" name="word">
	<br>
	<input type="submit" value="Saada" name="submit">
</form><br>
</body>
</html>



<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted

    if (isset($_POST['submit'])) {
        // btnsubmit
        $time_start = microtime(true);
        $word1 = $_POST['word'];
        $words_to_compare = create_anagram_array();
//var_dump($words_to_compare);
//$ee = json_encode($words_to_compare);
//$new = str_replace( array("\r", "\r\n", "\n" ), '', $words_to_compare);
 //var_dump($new);
foreach ($words_to_compare as $key => $val) {
	$word2 =  $val;
	find_anagram($word1, $word2);
}
$time_end = microtime(true);
$time = $time_end - $time_start;
echo 'Kulutatud aeg : '.$time.' seconds';

    } else {
        //nothing

    }
}


//find_anagram($word1, $word2);

//find_anagram($word1, implode(',', $file_words));

//find_anagram($word1, $word2);


?>