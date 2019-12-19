<?php
    class Tyrion extends Lannister
    {
        public function sleepWith($s)
        {
            if ($s instanceof Jaime)
                echo $this->n;
            if ($s instanceof Sansa)
                echo $this->l;
            if ($s instanceof Cersei)
                echo $this->n;
        }
    }
?>