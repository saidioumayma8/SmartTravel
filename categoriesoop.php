<?php

   class categories{
        private $descrt;
        private $img;
        private $ishide;
        private $name;
        


        public function __construct($descrt, $img, $ishide, $name){
            
            $this->descrt = $descrt;
            $this->img = $img;
            $this->ishide = $ishide;
            $this->name = $name;
        }

        public function getdescrt() 
        {
            return $this->descrt;
        }

        public function getimg() 
        {
            return $this->img;
        }

        public function ishide() 
        {
            return $this->ishide;
        }
        
        public function getname() 
        {
            return $this->name;
        }
        



   }