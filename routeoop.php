<?php

   class route{
        private $departure;
        private $destination;
        private $dist;
        private $duree;
        private $route_id;
        


        public function __construct($departure, $destination, $dist, $duree, $route_id ){
            
            $this->departure = $departure;
            $this->destination = $destination;
            $this->dist = $dist;
            $this->duree = $duree;
            $this->route_id = $route_id;
        }

        public function getdeparture() 
        {
            return $this->departure;
        }

        public function getdestination() 
        {
            return $this->destination;
        }

        public function getdist() 
        {
            return $this->dist;
        }
        
        public function getduree() 
        {
            return $this->duree;
        }
        
        public function getroute_id() 
        {
            return $this->route_id;
        }



   }