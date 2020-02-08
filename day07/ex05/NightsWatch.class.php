<?php
    class NightsWatch implements IFighter
    {
        public $tab = array();
        public function recruit($s)
        {
            if ($s instanceof IFighter)
                $this->tab[] = $s;
        }
        public function fight()
        {
            foreach($this->tab as $val)
            {
                if ($val instanceof IFighter)
                    $val->fight();
            }
        }
    }
?>