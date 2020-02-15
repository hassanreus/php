#!/usr/bin/php
<?php
	if ($argc == 2){
		$string =  $argv[1];
		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $string);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
		$data = curl_exec($handle);
		// $string = preg_replace("http:\/\/.*", $string = substr($string, 7),$string);
		if (preg_match("/^http:\/-|(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/", $string, $matchs) && $data){
			//echo $matchs[0];
			$path = $matchs[0];
			$file = $path;
			if (!file_exists($path)){
				mkdir($path);
				echo $data;
				if (preg_match('/<img[^>]+src\s*=\s*"([^">]+)/', $data, $matchs)){
					echo $matchs[1];
				}
				//$img = file_get_contents("http://".$path."images/home_big.jpg",NULL);
				//file_put_contents($file."omg.jpg" ,$img);
			}
		}else
			echo "EROOR\n";
		curl_close($handle);
	}
?>
