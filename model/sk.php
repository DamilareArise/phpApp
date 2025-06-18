<?php
    include 'mayors_project.php';

    class Sk_Brand extends Brand{
        private $price;

        public function __construct($inp_brand_name, $inp_product_name, $inp_price){
            parent::__construct($inp_brand_name, $inp_product_name);
            $this->price = $inp_price;
        
        }

        public function get_price(){
            return $this->price;
        }
    }
?>