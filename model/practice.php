<?php
    class Father{
        private $surname = 'Adebayo';
        protected $firstname = 'David';
        protected $fav_drink = 'Water';

        public function drink(){
            return "$this->firstname $this->surname loves drinking $this->fav_drink <br>";
        }
    }

    // $mayor = new Father();
    

    class Son extends Father{
        
        public function update_firstname($name){
            $this->firstname = $name;
        }

    }

    // $ayo = new Son();
    // $ayo->update_firstname('Ayo');
    // echo $ayo->drink();
    // echo $mayor->drink();






    // class Product extends Brand{

    //     public function update_product_name($name){
    //         $this->product_name = $name;
    //     }
    // }
    
    // $prd = new Product();
    // $prd-> update_product_name('Laptop');
    // echo $prd->showcase()
?>
