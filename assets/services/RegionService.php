<?php

class RegionService implements ServiceBase{

    private $utilities;
    private $context;

    public function __construct(){

        $this->utilities = new Utilities();
        $this->context = new PokemonContext($directory);

    }

    public function GetList(){

        $listRegiones = array();

        $stmnt = $this->context->db->prepare("Select * from regiones");
        $stmnt->execute();

        $result = $stmnt->get_result();

        if($result->num_rows === 0){
            return $listRegiones;
        }else{

            while($row = $result->fetch_object()){

                $region = new Region();

                $region->id = $row->id;
                $region->nombre = $row->nombre;
                $region->color = $row->color;

                array_push($listRegiones, $region);

            }

        }
        $stmnt->close();
        return $listRegiones;

    }

    public function GetById($id){

        $region = new Region();

        $stmnt = $this->context->db->prepare("Select * from regiones where id = ?");
        $stmnt->bind_param("i", $id);
        $stmnt->execute();

        $result = $stmnt->get_result();

        if($result->num_rows === 0){
            return null;
        }else{

            while($row = $result->fetch_object()){

                $region->id = $row->id;
                $region->nombre = $row->nombre;
                $region->color = $row->color;

            }

        }
        $stmnt->close();
        return $region;

    }

    public function Add($entidad){


        $stmnt = $this->context->db->prepare("Insert into regiones (nombre, color) values (?,?)");
        $stmnt->bind_param("ss", $entidad->nombre, $entidad->color);
        $stmnt->execute();
        $stmnt->close();

        $regionID = $this->context->db->insert_id;

    }

    public function Update($id, $entidad){

        $element = $this->GetById($id);

        $stmnt = $this->context->db->prepare("update regiones set nombre = ?, color = ? where id = ?");
        $stmnt->bind_param("ssi", $entidad->nombre, $entidad->color, $id);
        $stmnt->execute();
        $stmnt->close();
        
    }

    public function Delete($id){

        $stmnt = $this->context->db->prepare("delete from regiones where id = ?");
        $stmnt->bind_param("i", $id);
        $stmnt->execute();
        $stmnt->close();

}

?>