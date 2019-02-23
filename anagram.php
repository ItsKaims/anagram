<?php 
$file_words = array();

/******Custom Functions begin*******************************/
function create_anagram_array() {
	$file_lines = file('lemmad.txt');
	foreach ($file_lines as $line) {
    	$file_words[] = utf8_encode($line);
	}
	$result = json_encode($file_words);
	$result = str_replace( array("\r", "\r\n", "\n" ), '', $file_words);
	return $result;
}


function find_anagram($word1, $word2) {
	$count = 0;
		if (strlen($word1) == strlen($word2)) {
				if (count_chars(strtolower($word1), 1) == count_chars(strtolower($word2), 1)) {
					echo $word2 . '<br />';	
				}
			}
		}
/******Custom Functions end*******************************/
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

/******Program śtarts*******************************/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //If something posted

    if (isset($_POST['submit'])) {
        // Submit btn clicked
        $time_start = microtime(true);
        $word1 = $_POST['word'];
        $words_to_compare = create_anagram_array();
		foreach ($words_to_compare as $key => $val) {
			$word2 =  $val;
			find_anagram($word1, $word2);
		}
$time_end = microtime(true);
$time = round($time_end - $time_start, 2);
echo 'Kulutatud aeg : '.$time.' seconds';

    } else {
        //No button clicked

    }
}
/******Program end*******************************/

?>