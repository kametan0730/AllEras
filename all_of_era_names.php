<?php

$wiki = file_get_contents("https://ja.wikipedia.org/wiki/%E5%B8%B8%E7%94%A8%E6%BC%A2%E5%AD%97%E4%B8%80%E8%A6%A7");
preg_match_all('/[0-9]+<\/td>
<td style=".+"><a href=".+" class="extiw" title="wikt:.">(?<char>.)<\/a>/u', $wiki, $matches);

$names = "";

foreach($matches["char"] as $index1 => $char1){
	foreach($matches["char"] as $index2 =>$char2){
		if($index1 !== $index2){
			$names .= $char1.$char2.",";
		}
	}
}
file_put_contents("all_of_era_names.txt",$names);

?>