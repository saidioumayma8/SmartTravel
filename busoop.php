<?php

   class bus{
        private $num_bus;
        private $immat;
        private $id;
        private $fk_entreprice;
        private $capacite;
        


        public function __construct($num_bus, $immat, $id, $fk_entreprice, $capacite ){
            
            $this->num_bus = $num_bus;
            $this->immat = $immat;
            $this->id = $id;
            $this->fk_entreprice = $fk_entreprice;
            $this->capacite = $capacite;
        }

        public function getnum_bus() 
        {
            return $this->num_bus;
        }

        public function getimmat() 
        {
            return $this->immat;
        }

        public function getid() 
        {
            return $this->id;
        }
        
        public function getfk_entreprice() 
        {
            return $this->fk_entreprice;
        }
        
        public function getcapacite() 
        {
            return $this->capacite;
        }

        



   }