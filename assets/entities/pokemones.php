<?php

    class Pokemon {
    

        public $id;        
        public $fotoPokemon;
        public $nombre;
        public $tipo;
        public $region;
        public $habilidad1;
        public $habilidad2;
        public $habilidad3;
        public $habilidad4;

        public function __construct(){

        }

        public function set($data){
            foreach ($data as $key => $value) $this->{$key} = $value;
        }

        public function initializeData($id, $nombre, $tipo, $region, $habilidad1, $habilidad2, $habilidad3, $habilidad4){

            
            $this->id = $id;
            $this->nombre = $nombre;
            $this->tipo = $tipo;
            $this->region = $region;
            $this->habilidad1 = $habilidad1;
            $this->habilidad2 = $habilidad2;
            $this->habilidad3 = $habilidad3;
            $this->habilidad4 = $habilidad4;

            
        }

    
    }


?>