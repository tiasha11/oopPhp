<?php
    // class base{
    //     public $name;
    //     public function __construct($n)
    //     {
    //         $this->name=$n;
    //     }
    //     public function show(){
    //         echo "Your name: ".$this->name."<BR>";
    //     }
    // }
    // $text=new base("Tiasha Choudhury");
    // $text->name="Choudhury Tiasha";
    // $text->show();

    // class base{
    //     protected $name;
    //     public function __construct($n)
    //     {
    //         $this->name=$n;
    //     }
    //     protected function show(){
    //         echo "Your name: ".$this->name."<BR>";
    //     }
    // }

    // class derived extends base{
    //     public function get(){
    //         echo "Your name: ".$this->name."<BR>";
    //     }    
    // }

    // $text=new derived("Tiasha Choudhury");
    // // $text->name="Choudhury Tiasha";
    // $text->get();


    class base{
        private $name;
        public function __construct($n)
        {
            $this->name=$n;
        }
        public function show(){
            echo "Your name: ".$this->name."<BR>";
        }
    }

    class derived extends base{
        public function get(){
            echo "Your name: ".$this->name."<BR>";
        }    
    }

    $text=new base("Tiasha Choudhury");
    // $text->name="Choudhury Tiasha";
    $text->show();

?>