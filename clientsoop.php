<?php

   class clients{
        private $adresse;
        private $email;
        private $full_name;
        private $password;
        private $phone;
        private $username;
        private $ville;
        


        public function __construct($adresse, $email, $full_name, $password, $phone, $username, $ville ){
            
            $this->adresse = $adresse;
            $this->email = $email;
            $this->full_name = $full_name;
            $this->password = $password;
            $this->phone = $phone;
            $this->username = $username;
            $this->ville = $ville;
        }

        public function getadresse() 
        {
            return $this->adresse;
        }

        public function getemail() 
        {
            return $this->email;
        }

        public function getfull_name() 
        {
            return $this->full_name;
        }
        
        public function getpassword() 
        {
            return $this->getpassword();
        }
        
        public function getphone() 
        {
            return $this->phone;
        }
        
        
        public function getusername() 
        {
            return $this->username;
        }
        
        
        public function getville() 
        {
            return $this->ville;
        }



   }