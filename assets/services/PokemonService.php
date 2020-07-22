<?php

class PokemonService implements ServiceBase{

    private $utilities;
    private $context;

    public function __construct($directory){

        $this->utilities = new Utilities();
        $this->context = new PokemonContext($directory);

    }

    public function GetList(){

        $listPokemon = array();

        $stmnt = $this->context->db->prepare("Select * from pokemones");
        $stmnt->execute();

        $result = $stmnt->get_result();

        if($result->num_rows === 0){
            return $listPokemon;
        }else{

            while($row = $result->fetch_object()){

                $pokemon = new Pokemon();

                $pokemon->id = $row->id;
                $pokemon->nombre = $row->nombre;
                $pokemon->tipo = $row->tipo;
                $pokemon->region = $row->region;
                $pokemon->habilidad1 = $row->habilidad1;
                $pokemon->habilidad2 = $row->habilidad2;
                $pokemon->habilidad3 = $row->habilidad3;
                $pokemon->habilidad4 = $row->habilidad4;

                array_push($listPokemon, $pokemon);

            }

        }
        $stmnt->close();
        return $listPokemon;

    }

    public function GetById($id){

        $pokemon = new Pokemon();

        $stmnt = $this->context->db->prepare("Select * from pokemones where id = ?");
        $stmnt->bind_param("i", $id);
        $stmnt->execute();

        $result = $stmnt->get_result();

        if($result->num_rows === 0){
            return null;
        }else{

            while($row = $result->fetch_object()){

                $pokemon->id = $row->id;
                $pokemon->nombre = $row->nombre;
                $pokemon->tipo = $row->tipo;
                $pokemon->region = $row->region;
                $pokemon->habilidad1 = $row->habilidad1;
                $pokemon->habilidad2 = $row->habilidad2;
                $pokemon->habilidad3 = $row->habilidad3;
                $pokemon->habilidad4 = $row->habilidad4;

            }

        }
        $stmnt->close();
        return $pokemon;

    }

    public function Add($entidad){


        $stmnt = $this->context->db->prepare("Insert into pokemones (nombre, tipo, region, habilidad1, habilidad2, habilidad3, habilidad4) values (?,?,?,?,?,?,?)");
        $stmnt->bind_param("sssssss", $entidad->nombre, $entidad->tipo, $entidad->region, $entidad->habilidad1, $entidad->habilidad2, $entidad->habilidad3, $entidad->habilidad4);
        $stmnt->execute();
        $stmnt->close();

        $pokemonID = $this->context->db->insert_id;

        if(isset($_FILES['fotoPokemon'])){

            $fotoFile = $_FILES['fotoPokemon'];

            if($fotoFile['error'] == 4){
                $entidad->fotoPokemon = "";
            }else{

                $typeReplace = str_replace("image/", "", $_FILES['fotoPokemon']['type']); 
                $type = $fotoFile['type'];
                $size = $fotoFile['size'];
                $nombre = $pokemonID . '.' . $typeReplace;
                $tmpname = $fotoFile['tmp_name'];

                $success = $this->utilities->agregarImagen('../image/pokemones/', $nombre, $tmpname, $type, $size);

                if($success){
                    $stmnt = $this->context->db->prepare("update pokemones set fotoPokemon = ? where id = ?");
                    $stmnt->bind_param("si", $nombre, $pokemonID);
                    $stmnt->execute();
                    $stmnt->close();
                }
            }

        }

    }

    public function Update($id, $entidad){

        $element = $this->GetById($id);

        $stmnt = $this->context->db->prepare("update pokemones set nombre = ?, tipo = ?, region = ?, habilidad1 = ?, habilidad2 = ?, habilidad3 = ?, habilidad4 = ? where id = ?");
        $stmnt->bind_param("sssssssi", $entidad->nombre, $entidad->tipo, $entidad->region, $entidad->habilidad1, $entidad->habilidad2, $entidad->habilidad3, $entidad->habilidad4, $id);
        $stmnt->execute();
        $stmnt->close();
        
        
        if(isset($_FILES['fotoPokemon'])){

            $fotoFile = $_FILES['fotoPokemon'];

            if($fotoFile['error'] == 4){

                $entidad->fotoPokemon = $element->fotoPokemon;

            }else{
                $typeReplace = str_replace("image/", "", $fotoFile['type']); 
                $type = $fotoFile['type'];
                $size = $fotoFile['size'];
                $nombre = $id . '.' . $typeReplace;
                $tmpFile = $fotoFile['tmp_name'];
    
                $success = $this->utilities->agregarImagen('../image/pokemones/', $nombre, $tmpFile, $type, $size);
    
                if($success){
                    $stmnt = $this->context->db->prepare("update pokemones set fotoPokemon = ? where id = ?");
                    $stmnt->bind_param("si", $nombre, $id);
                    $stmnt->execute();
                    $stmnt->close();
                }
            }

            

        }
    }

    public function Delete($id){

        $stmnt = $this->context->db->prepare("delete from pokemones where id = ?");
        $stmnt->bind_param("i", $id);
        $stmnt->execute();
        $stmnt->close();

    }
}

?>