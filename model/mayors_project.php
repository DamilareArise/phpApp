<?php
    class Brand{
        private $brand_name;
        protected $product_name;

        function __construct($inp_brand_name, $inp_product_name){
            $this->brand_name = $inp_brand_name;
            $this->product_name = $inp_product_name;
        }

        public function showcase(){
            return "Displaying $this->brand_name $this->product_name to the viewers. <br>";
        }
    }
?>