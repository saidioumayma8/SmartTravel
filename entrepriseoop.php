<?php

   class entreprice{
        private $idEn;
        private $img;
        private $nameEn;
        


        public function __construct($idEn, $img, $nameEn){
            
            $this->idEn = $idEn;
            $this->img = $img;
            $this->nameEn = $nameEn;
          
        }

        public function getidEn() 
        {
            return $this->idEn;
        }

        public function getimg() 
        {
            return $this->img;
        }

        public function getnameEn() 
        {
            return $this->nameEn;
        }
        
       



   }