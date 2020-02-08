#!/usr/bin/php
<?php
    if ($argc == 2){
        $file = fopen($argv[1], 'r');
        while(!feof($file)){
            $string = fgets($file);
            $string = preg_replace_callback('/<a.*?title="(.*?)">/',
                function ($matches) {
                    return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
                },$string);
            $string = preg_replace_callback('/<a.*?>(.*?)</',
                function ($matches) {
                    return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
                },$string);
            echo $string;
        }
        fclose($file);
    }
?>