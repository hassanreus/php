<?php
   function ft_split($str)
   {
        $str = trim($str);
        $str = preg_replace('/\s+/', ' ', $str);
        $str = explode(' ', $str);
        sort($str);
        return ($str);
    }
?>