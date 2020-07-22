<?php

    class Region {
    

        public $id;        
        public $nombre;
        public $color;

        public function __construct(){

        }

        public function set($data){
            foreach ($data as $key => $value) $this->{$key} = $value;
        }

        public function initializeData($id, $nombre, $color){

            
            $this->id = $id;
            $this->nombre = $nombre;
            $this->color = $color;

            
        }

    
    }


?>