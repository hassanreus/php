<?php
    class UnholyFactory {

        public $tab = array();
        public $tabs = array();

        public function absorb($obj){
            if ($obj instanceof Fighter)
            {
                if (!(in_array($obj->type, $this->tab)))
                {
                    $this->tab[] = $obj->type;
                    $this->tabs[] = $obj;
                    print("(Factory absorbed a fighter of type " . $obj->type . ")" . PHP_EOL);
                }
                else
                    print("(Factory already absorbed a fighter of type " . $obj->type . ")" . PHP_EOL);
            }
            else {
                print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
            }
        }

        public function fabricate($var)
        {
            foreach ($this->tabs as $key)
            {
                if ($key->type == $var)
                {
                    print("(Factory fabricates a fighter of type " . $var . ")" . PHP_EOL);
                    return  $key;
                }
            }
            print("(Factory hasn't absorbed any fighter of type " . $var . ")" . PHP_EOL);
            return ;
        }
    }
?>
