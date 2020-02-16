#!/usr/bin/php
<?php
	if ($argc == 2){
		if(strstr($argv[1], 'http:'))
			$url = preg_replace('/http/', 'https', $argv[1]);
		else
			$url = $argv[1];
		$handle = curl_init();
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($handle, CURLOPT_URL, $url);
		$data = curl_exec($handle);
		if ($data){
			preg_match('/(.*www.)?(.+)/', $argv[1], $matches);
			$path = $matches[2];
			if (!file_exists($path)){
				mkdir($path);
				preg_match_all('/<img[^>]+src\s*=\s*"([^">]+)"/', $data, $matchs);
				foreach ($matchs[1] as $match){
					if(!in_array("https:", explode("/", $match)))
						$match = $url.$match;
					$tmp1 = explode('/', $match);
					$img = preg_match('/.*\/(.+)/', $match, $name);
					file_put_contents($path."/".$name[1], $img);
				}
			}
		}
		curl_close($handle);
	}
?>