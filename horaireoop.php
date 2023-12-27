<?php

   class bus{
        private $bus_id;
        private $date;
        private $horaire_id;
        private $hr_arv;
        private $hr_dep;
        private $prix;
        private $route_id;
        private $sieges_dispo;
        


        public function __construct($bus_id, $date, $horaire_id, $hr_arv, $hr_dep, $prix, $route_id, $sieges_dispo){
            
            $this->bus_id = $bus_id;
            $this->date = $date;
            $this->horaire_id = $horaire_id;
            $this->hr_arv = $hr_dep;
            $this->prix = $prix;
            $this->route_id = $route_id;
            $this->sieges_dispo = $sieges_dispo;
        }

        public function getbus_id() 
        {
            return $this->bus_id;
        }

        public function getdate() 
        {
            return $this->date;
        }

        public function gethoraire_id() 
        {
            return $this->horaire_id;
        }
        
        public function gethr_arv() 
        {
            return $this->hr_arv;
        }
        
        public function getprix() 
        {
            return $this->prix;
        }
        
        public function getroute_id() 
        {
            return $this->route_id;
        }
        
        public function getsieges_dispo() 
        {
            return $this->sieges_dispo;
        }



   }