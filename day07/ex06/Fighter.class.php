<?php
    abstract class Fighter
    {
        abstract public function fight($i);
        public $type;
        public function __construct($var){
            $this->type = $var;
        }
    }
?>