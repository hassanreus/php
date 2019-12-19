<?php
    class Jaime extends Lannister
    {
        public function sleepWith($s)
        {
            if ($s instanceof Tyrion)
                echo $this->n;
            if ($s instanceof Sansa)
                echo $this->l;
            if ($s instanceof Cersei)
                echo $this->w;
        }
    }
?>