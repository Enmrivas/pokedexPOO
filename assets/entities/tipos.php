<?php

    class Region {
    

        public $id;        
        public $nombre;

        public function __construct(){

        }

        public function set($data){
            foreach ($data as $key => $value) $this->{$key} = $value;
        }

        public function initializeData($id, $nombre){

            
            $this->id = $id;
            $this->nombre = $nombre;

            
        }

    
    }


?>